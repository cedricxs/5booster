<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Model\Recette;
use Illuminate\Http\Request;

class RecetteController extends Controller
{
    //
    public function getById($id)
    {
        $recette = Recette::find($id);
        $recette->addView();
        return view('recette.view',['recette'=>$recette]);
    }


    public function download($id, Request $request)
    {
        $recette = Recette::find($id);
        $title = $recette->title;

        //PDF file is stored under project/storage/app/workouts/info.pdf
        $file_path = storage_path().$recette->url_recette;
        $extension = pathinfo($recette->url_recette, PATHINFO_EXTENSION);

        return response()->download($file_path, "$title.$extension");
    }
}
