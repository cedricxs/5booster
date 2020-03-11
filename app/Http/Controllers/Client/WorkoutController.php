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
}
