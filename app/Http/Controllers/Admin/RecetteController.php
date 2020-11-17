<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Ingredient;
use App\Http\Model\Recette;
use App\Http\Model\RecetteHasIngredient;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Response;
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
        $ingredients = Ingredient::all();
        return view('admin.recettes.create')->with(['admin'=>$request->user(),'ingredients'=>$ingredients]);
    }

    public function destroy($id_recette)
    {
        $recette = Recette::find($id_recette);
        $recette->delete();
        return Response::json(['status'=>0,'msg'=>'delete '.$recette->name.' successfully!']);
    }

    public function store(Request $request)
    {
        $data = [
            'recette_name'=>$request['name'],
            'description'=>$request['description'],
            'view'=>0,
        ];
        if($request->hasFile('recette_img')){
            $img = $request->file('recette_img');
            $extension = $img->getClientOriginalExtension();
            $imgname = "$request->name.$extension";
            $img->storeAs('img/recettes/', $imgname,['disk'=>'public']);
            $data['url_preview'] = 'img/recettes/'.$imgname;
        }
        $recette = Recette::create($data);
        if(!is_null($request['ingredient'])) {
            foreach ($request['ingredient'] as $ingredient) {
                $recette_has_ingredient = [];
                $recette_has_ingredient['id_recette'] = $recette->id_recette;
                $recette_has_ingredient['id_ingredient'] = $ingredient['id_ingredient'];
                $recette_has_ingredient['quantite'] = $ingredient['quantite'];
                RecetteHasIngredient::create($recette_has_ingredient);
            }
        }

        return back()->with('msg','add the recette successfully');
    }

    public function edit($id_recette, Request $request)
    {
        $recette = Recette::find($id_recette);
        $ingredients = RecetteHasIngredient::where(['id_recette'=>$id_recette])->get();
        foreach ($ingredients as $ingredient){
            $ingredient->ingredient_name = Ingredient::find($ingredient->id_ingredient)->ingredient_name;
        }
        $all_ingredients = Ingredient::all();
        return view('admin.recettes.edit',['recette'=>$recette,'ingredients'=>$ingredients,
            'all_ingredients'=>$all_ingredients,'admin'=>$request->user()]);
    }

    public function update(Request $request,$recette_id)
    {
        $data = [
            'recette_name'=>$request['name'],
            'description'=>$request['description'],
        ];
        $recette = Recette::find($recette_id);
        if($request->hasFile('recette_img')){
            $img = $request->file('recette_img');
            $extension = $img->getClientOriginalExtension();
            $imgname = "$request->name.$extension";
            $img->storeAs('img/recettes/', $imgname,['disk'=>'public']);
            $data['url_preview'] = 'img/recettes/'.$imgname;
            unlink(public_path($recette->url_preview));
        }
        if(!is_null($request['ingredient'])) {
            $old_ingredients = RecetteHasIngredient::where(['id_recette'=>$recette_id])->get();
            foreach($old_ingredients as $old_ingredient)
                $old_ingredient->delete();
            foreach ($request['ingredient'] as $ingredient) {
                $recette_has_ingredient = [];
                $recette_has_ingredient['id_recette'] = $recette->id_recette;
                $recette_has_ingredient['id_ingredient'] = $ingredient['id_ingredient'];
                $recette_has_ingredient['quantite'] = $ingredient['quantite'];
                RecetteHasIngredient::create($recette_has_ingredient);
            }
        }
        $recette->update($data);
        return back()->with('msg','update the recette successfully');
    }
}
