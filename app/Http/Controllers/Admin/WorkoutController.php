<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Workout;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
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
        $contraintes = $this->getFilte($data);
        $workouts = Workout::where($contraintes)->paginate(5);
        return view('admin.workouts.index',['data'=>$workouts,'admin'=>$request->user(),'contraintes'=>$data]);
    }
    public function getFilte($data){
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
        $workout = Workout::find($workout_id);
        $workout->delete();
        return Response::json(['status'=>0,'msg'=>'delete '.$workout->title.' successfully!']);
    }

    public function store(Request $request)
    {
        $data = [
          'title'=>$request['title'],
          'type'=>$request['type'],
          'focus'=>$request['focus'],
          'difficulty'=>$request['difficulty'],
          'view'=>0,
        ];
        $file = $request->file('workout');
        $extension = $file->getClientOriginalExtension();
        $filename = "$request->title.$extension";
        $file->storeAs('workouts/', $filename);
        $data['url_workout'] = '\app\workouts\\'.$filename;
        Workout::create($data);
        return back()->with('msg','add the workout successfully');
    }

    public function edit($workout_id, Request $request)
    {
        $workout = Workout::find($workout_id);
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
        $workout = Workout::find($workout_id);
        $new_file = $request->file('workout');
        if(!is_null($new_file)){
            $old_file = storage_path().$workout->url_workout;
            unlink($old_file);
            $extension = $new_file->getClientOriginalExtension();
            $filename = "$request->title.$extension";
            $new_file->storeAs('workouts/', $filename);
            $data['url_workout'] = '\app\workouts\\'.$filename;
        }
        $workout->update($data);
        return back()->with('msg','update the workout successfully');
    }
}
