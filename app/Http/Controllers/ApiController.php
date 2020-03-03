<?php


namespace App\Http\Controllers;
use App\Http\Model\Workout;
use  Illuminate\Support\Facades\Response;

class ApiController extends Controller
{
    public function getWorkouts(){
        $workouts = Workout::all();
        $json = array();
        foreach ($workouts as $workout){
            $json[] = $workout->toArray();
        }
        return Response::json($json);
    }


}
