<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Model\SportProgram;
use App\Http\Model\WeekProgram;
use App\Http\Model\Description;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    //
    public function getById($id)
    {
        $workout = WeekProgram::find($id);
        $exercices = SportProgram::where('workout_id',$workout->id)->orderby('index_workout')->get();
        $description = Description::where('workout_id',$workout->id)->get();
        return view('workout.view',['workout'=>$workout,'exercices'=>$exercices,'description'=>$description]);
    }


    public function download($id, Request $request)
    {
        $workout = WeekProgram::find($id);
        $title = $workout->title;

        //PDF file is stored under project/storage/app/workouts/info.pdf
        $file_path = storage_path().$workout->url_workout;
        $extension = pathinfo($workout->url_workout, PATHINFO_EXTENSION);

        return response()->download($file_path, "$title.$extension");
    }
}
