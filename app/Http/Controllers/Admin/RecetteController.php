<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Recette;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RecetteController extends Controller
{
    /**
     * Get all Recettes
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $recettes = Recette::paginate(5);
        return view('admin.recettes.index',['data'=>$recettes,'admin'=>$request->user()]);
    }

    public function create(Request $request)
    {
        return view('admin.recettes.create')->with(['admin'=>$request->user()]);
    }

    public function destroy($recette_id)
    {
        $recette = Recette::find($recette_id);
        $recette->delete();
        return Response::json(['status'=>0,'msg'=>'delete '.$recette->title.' successfully!']);
    }

    public function store(Request $request)
    {
        $data = [
            'title'=>$request['title'],
            'repas'=>$request['repas'],
            'diet'=>$request['diet'],
            'view'=>0,
        ];
        $file = $request->file('recette');
        $extension = $file->getClientOriginalExtension();
        $filename = "$request->title.$extension";
        $file->storeAs('recettes/', $filename);
        $data['url_recette'] = '\app\recettes\\'.$filename;
        Recette::create($data);
        return back()->with('errors','add the recette successfully');
    }

    public function edit($recette_id, Request $request)
    {
        $recette = Recette::find($recette_id);
        return view('admin.recettes.edit',['recette'=>$recette,'admin'=>$request->user()]);
    }

    public function update(Request $request,$recette_id)
    {
        $data = [
            'title'=>$request['title'],
            'repas'=>$request['repas'],
            'diet'=>$request['diet'],
        ];
        $recette = Recette::find($recette_id);
        $new_file = $request->file('recette');
        if(!is_null($new_file)){
            if($recette->url_recette != ''){
                $old_file = storage_path().$recette->url_recette;
                unlink($old_file);
            }
            $extension = $new_file->getClientOriginalExtension();
            $filename = "$request->title.$extension";
            $new_file->storeAs('recettes/', $filename);
            $data['url_recette'] = '\app\recettes\\'.$filename;
        }
        $recette->update($data);
        return back()->with('errors','update the recette successfully');
    }
}
