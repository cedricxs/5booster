<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Exercise;
use App\Http\Model\ProgramHasCategory;
use App\Http\Model\ProgramHasExercise;
use App\Http\Model\SportCategory;
use App\Http\Model\WeekProgram;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;


class ProgramController extends Controller
{
    /**
     * Get all Workouts
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $category = $request['category'];
        if($category=='All')unset($category);
        if(isset($category)){
            $id_contrainte_category = SportCategory::where(['sport_category_name'=>$category])
                ->get()->first()->id_sport_category;
            $records = ProgramHasCategory::where('id_sport_category',$id_contrainte_category)->get();
            $id_week_program = [];
            foreach ($records as $r){
                $id_week_program[] = $r->id_week_program;
            }
        }

        if(isset($category))
            $programs = WeekProgram::whereIn('id_week_program',$id_week_program)->paginate(5);
        else{
            $programs = WeekProgram::paginate(5);
        }
        foreach($programs as $program){
            $category_id = ProgramHasCategory::where(['id_week_program'=>$program->id_week_program])
                ->get()->first()->id_sport_category;
            $program->category = SportCategory::find($category_id);
        }
        $categories = SportCategory::all();
        return view('admin.programs.index',['data'=>$programs,'admin'=>$request->user(),'contrainte_category'=>$category??'All','categories'=>$categories]);
    }


    public function create(Request $request)
    {
        $categories = SportCategory::all();
        return view('admin.programs.create')->with(['admin'=>$request->user(),'categories'=>$categories]);
    }

    public function destroy($workout_id)
    {
        $workout = WeekProgram::find($workout_id);
        $workout->delete();
        return Response::json(['status'=>0,'msg'=>'delete '.$workout->title.' successfully!']);
    }

    public function store(Request $request)
    {
        $id_week_program = WeekProgram::max('id_week_program')+1;
        $program = [
            'id_week_program'=>$id_week_program,
            'week_number'=>$request['week_number'],
            'free'=>$request['free']=='on'?true:false,
//          'view'=>0,
        ];
        if($request->hasFile('pdf')){
            $file = $request->file('pdf');
            $extension = $file->getClientOriginalExtension();
            $filename = "program_" . $program['id_week_program'] . '_' . $program['week_number'] . '.' . $extension;
            $file->storeAs('programs/', $filename);
            $program['url_pdf'] = 'app' . DIRECTORY_SEPARATOR . 'programs'. DIRECTORY_SEPARATOR  . $filename;
        }
        if($request['nb_exercise']>0){
            for($i=0;$i<$request['nb_exercise'];$i++){
                $exercise = [
                    'id_exercise'=>Exercise::max('id_exercise')+1,
                    'exercise_name'=>$request['exercise_name_'.($i+1)],
                    'exercise_video_url'=>$request['exercise_video_url_'.($i+1)],
                ];
                Exercise::create($exercise);
                ProgramHasExercise::create(['id_exercise'=>$exercise['id_exercise'],'id_week_program'=>$id_week_program]);
            }
        }
        WeekProgram::create($program);
        ProgramHasCategory::create(['id_week_program'=>$id_week_program,'id_sport_category'=>$request['category']]);
        return back()->with('msg','add the program successfully');
    }

    public function edit($id_week_program, Request $request)
    {
        $program= WeekProgram::find($id_week_program);
        $categories = SportCategory::all();
        $current_category = ProgramHasCategory::where(['id_week_program'=>$program->id_week_program])->get()->first();
        $id_exercise = [];
        $records = ProgramHasExercise::where(['id_week_program'=>$id_week_program])->get();
        foreach($records as $record){
            $id_exercise[] = $record->id_exercise;
        }
        $exercises = Exercise::whereIn('id_exercise',$id_exercise)->get();
        return view('admin.programs.edit',
            ['program'=>$program,
                'admin'=>$request->user(),
                'categories'=>$categories,
                'current_category'=>$current_category,
                'exercises'=>$exercises]);
    }

    public function update(Request $request,$id_week_program)
    {
        $data = [
            'week_number'=>$request['week_number'],
            'free'=>$request['free']=='on'?true:false,
        ];
        $new_id_category = $request['category'];
        $record = ProgramHasCategory::where('id_week_program',$id_week_program)->get()->first();
        $record->id_sport_category = $new_id_category;

        $program = WeekProgram::find($id_week_program);
        if($request->hasFile('pdf')){
            $new_file = $request->file('pdf');
            if(!is_null($program->url_pdf)){
                $old_file = storage_path().DIRECTORY_SEPARATOR.$program->url_pdf;
                unlink($old_file);
            }
            $extension = $new_file->getClientOriginalExtension();
            $filename = "program_" . $id_week_program . '_' . $data['week_number'] . '.' . $extension;
            $new_file->storeAs('programs/', $filename);
            $data['url_pdf'] = 'app' . DIRECTORY_SEPARATOR . 'programs'. DIRECTORY_SEPARATOR . $filename;
        }

        if($request['change_exercise']=="true"){
            $records_phe = ProgramHasExercise::where('id_week_program',$id_week_program)->get();
            foreach ($records_phe as $record_phe){
                $record_phe->delete();
            }
            if($request['nb_exercise']>0){
                for($i=0;$i<$request['nb_exercise'];$i++){
                    $exercise = [
                        'exercise_name'=>$request['exercise_name_'.($i+1)],
                        'exercise_video_url'=>$request['exercise_video_url_'.($i+1)],
                    ];
                    $exist = Exercise::where($exercise)->get();
                    if(count($exist)==0){
                        $exercise['id_exercise'] = Exercise::max('id_exercise')+1;
                        Exercise::create($exercise);
                    }else{
                        $exercise['id_exercise'] = $exist->first()->id_exercise;
                    }
                    ProgramHasExercise::create(['id_exercise'=>$exercise['id_exercise'],'id_week_program'=>$id_week_program]);
                }
            }
        }
        foreach($data as $key=>$val){
            $program->$key = $val;
        }



        $changes = $program->syncChanges()->getChanges();
        $changes = array_merge($changes,$record->syncChanges()->getChanges());
        $info = "{";
        foreach ($changes as $key=>$val){
            $origin = $program->getOriginal($key);
            $info = $info."$key : $origin -> $val ;";
        }
        $info = $info."}";
        $program->save();
        $record->save();
        Log::info('admin '.$request->user()->username.' has updated the workout '.$id_week_program." {$info}");
        return back()->with('msg','update the workout successfully');
    }
}
