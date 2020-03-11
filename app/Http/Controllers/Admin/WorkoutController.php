<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Workout;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    /**
     * Get all Workouts
     *
     * */
    public function index()
    {
        $workouts = Workout::paginate(5);
        return view('admin.workouts.index',['data'=>$workouts]);
    }

    public function create()
    {

    }
}
