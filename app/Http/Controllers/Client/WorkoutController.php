<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Model\Workout;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    //
    public function getById($id)
    {
        $workout = Workout::find($id);
        $workout->addView();
        return view('workout.view',['workout'=>$workout]);
    }


    public function download($id, Request $request)
    {
        $workout = Workout::find($id);
        $title = $workout->title;

        //PDF file is stored under project/storage/app/workouts/info.pdf
        $file_path = storage_path().$workout->url_workout;
        $extension = pathinfo($workout->url_workout, PATHINFO_EXTENSION);

        return response()->download($file_path, "$title.$extension");
    }
}
