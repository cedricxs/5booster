<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\ProgramNiveau;
use App\Http\Model\ProgramObject;
use App\Http\Model\SportProgram;
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
    public function index(Request $request){
        $niveau = ProgramNiveau::all();
        $object = ProgramObject::all();
        $count = [];
        foreach ($niveau as $n){
            foreach ($object as $o){
                $count["$n->id_program_niveau".'_'."$o->id_program_object"] = SportProgram::where(['niveau'=>$n->id_program_niveau,'object'=>$o->id_program_object])->count();
            }
        }
        return view('admin.programs.plan',['niveau'=>$niveau,'object'=>$object,'admin'=>$request->user(),'count'=>$count]);

    }

    public function indexCell(Request $request)
    {
        $id_niveau = $request['niveau'];
        $id_object = $request['object'];
        $programs = SportProgram::where(['niveau'=>$id_niveau,'object'=>$id_object])->paginate(5);
        $niveau = ProgramNiveau::find($id_niveau);
        $object = ProgramObject::find($id_object);
        return view('admin.programs.index',['data'=>$programs,'admin'=>$request->user(),'niveau'=>$niveau,'object'=>$object]);
    }


    public function create(Request $request)
    {
        $id_niveau = $request['niveau'];
        $id_object = $request['object'];
        $niveau = ProgramNiveau::find($id_niveau);
        $object = ProgramObject::find($id_object);
        $all_niveau = ProgramNiveau::all();
        $all_object = ProgramObject::all();
        return view('admin.programs.create')->with(['admin'=>$request->user(),
            'niveau'=>$niveau,'object'=>$object,'all_niveau'=>$all_niveau,'all_object'=>$all_object]);
    }

    public function destroy($workout_id)
    {
        $workout = WeekProgram::find($workout_id);
        $workout->delete();
        return Response::json(['status'=>0,'msg'=>'delete '.$workout->title.' successfully!']);
    }

    public function store(Request $request)
    {
        $data = [
            'program_name'=>$request['name'],
            'program_video_url'=>$request['video_url'],
            'niveau'=>$request['niveau'],
            'object'=>$request['object'],
            'view'=>0,
        ];
        SportProgram::create($data);
        return redirect('admin/programscell?niveau='."$request->niveau&object=$request->object")->with('msg','add the program successfully');
    }

    public function edit($id_program, Request $request)
    {
        $program = SportProgram::find($id_program);
        $all_niveau = ProgramNiveau::all();
        $all_object = ProgramObject::all();
        $niveau = ProgramNiveau::find($program->niveau);
        $object = ProgramObject::find($program->object);
        return view('admin.programs.edit',['admin'=>$request->user(),'program'=>$program,
            'niveau'=>$niveau,'object'=>$object,
            'all_niveau'=>$all_niveau,'all_object'=>$all_object]);
    }

    public function update(Request $request, $id_program)
    {
        $data = [
            'program_name'=>$request['name'],
            'program_video_url'=>$request['video_url'],
            'niveau'=>$request['niveau'],
            'object'=>$request['object'],
        ];
        $program = SportProgram::find($id_program);
        $old_niveau = $program->niveau;
        $old_object = $program->object;
        $program->update($data);

        $changes = $program->syncChanges()->getChanges();
        $info = "{";
        foreach ($changes as $key=>$val){
            $origin = $program->getOriginal($key);
            $info = $info."$key : $origin -> $val ;";
        }
        $info = $info."}";
        $program->save();
        Log::info('admin '.$request->user()->username.' has updated the program '.$id_program." {$info}");
        return redirect('admin/programscell?niveau='."$old_niveau&object=$old_object")->with('msg','update the program successfully');
    }
}
