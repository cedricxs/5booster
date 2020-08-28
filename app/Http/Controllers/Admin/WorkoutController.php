<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Exercise;
use App\Http\Model\WeekProgram;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;


class WorkoutController extends Controller
{
    /**
     * Get all Workouts
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $type = $request['type'];
        $difficulty = $request['difficulty'];
        $focus = $request['focus'];
        $data = ['type'=>$type??'All','difficulty'=>$difficulty??'All','focus'=>$focus??'All'];
        $contraintes = $this->getFiltre($data);
        $workouts = WeekProgram::where($contraintes)->paginate(5);
        return view('admin.workouts.index',['data'=>$workouts,'admin'=>$request->user(),'contraintes'=>$data]);
    }
    public function getFiltre($data){
        $filte = array();
        foreach ($data as $k=>$v){
            if(isset($v) && $v!='All')
                $filte[$k] = $v;
        }
        return $filte;
    }

    public function create(Request $request)
    {
        return view('admin.workouts.create')->with(['admin'=>$request->user()]);
    }

    public function destroy($workout_id)
    {
        $workout = WeekProgram::find($workout_id);
        $workout->delete();
        return Response::json(['status'=>0,'msg'=>'delete '.$workout->title.' successfully!']);
    }

    public function store(Request $request)
    {
        $workout = [
          'title'=>$request['title'],
          'type'=>$request['type'],
          'focus'=>$request['focus'],
          'difficulty'=>$request['difficulty'],
          'view'=>0,
          'nb_exercice'=>$request['nb_exercice'],
           'id'=>WeekProgram::all()->count()+1
        ];
/*        if($workout['nb_exercice']>0){
            for($i=0;$i<$workout['nb_exercice'];$i++){
                $exercice = [
                    'id'=>Exercice::all()->count()+1,
                    'title'
                ];
            }
            $file = $request->file('workout');
            $extension = $file->getClientOriginalExtension();
            $filename = "$request->title.$extension";
            $file->storeAs('workouts/', $filename);
            $workout['url_workout'] = '\app\workouts\\'.$filename;
        }*/
        WeekProgram::create($workout);
        return back()->with('msg','add the workout successfully');
    }

    public function edit($workout_id, Request $request)
    {
        $workout = WeekProgram::find($workout_id);
        return view('admin.workouts.edit',['workout'=>$workout,'admin'=>$request->user()]);
    }

    public function update(Request $request,$workout_id)
    {
        $data = [
            'title'=>$request['title'],
            'type'=>$request['type'],
            'focus'=>$request['focus'],
            'difficulty'=>$request['difficulty'],
        ];
        $workout = WeekProgram::find($workout_id);
        if($request->hasFile('workout')){
            $new_file = $request->file('workout');
            $old_file = storage_path().$workout->url_workout;
            unlink($old_file);
            $extension = $new_file->getClientOriginalExtension();
            $filename = "$request->title.$extension";
            $new_file->storeAs('workouts/', $filename);
            $data['url_workout'] = '\app\workouts\\'.$filename;
        }
        foreach($data as $key=>$val){
            $workout->$key = $val;
        }
        $changes = $workout->syncChanges()->getChanges();
        $info = "{";
        foreach ($changes as $key=>$val){
            $origin = $workout->getOriginal($key);
            $info = $info."$key : $origin -> $val ;";
        }
        $info = $info."}";
        $workout->save();
        Log::info('admin '.$request->user()->username.' has updated the workout '.$workout_id." {$info}");
        return back()->with('msg','update the workout successfully');
    }
}
