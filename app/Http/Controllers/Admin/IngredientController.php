<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Model\Ingredient;
use App\Http\Model\RecetteHasIngredient;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Response;

class IngredientController extends Controller
{

    public function index(Request $request)
    {
        $ingredients = Ingredient::paginate(5);
        return view('admin.ingredients.index',['data'=>$ingredients,'admin'=>$request->user()]);
    }

    public function create(Request $request)
    {
        return view('admin.ingredients.create')->with(['admin'=>$request->user()]);
    }

    public function store(Request $request)
    {
        $data = [
            'ingredient_name'=>$request['name'],
        ];

        Ingredient::create($data);
        return back()->with('msg','add the ingredient successfully');
    }

    public function destroy($id_ingredient)
    {
        $ingredient = Ingredient::find($id_ingredient);
        $ingredient->delete();
        $records = RecetteHasIngredient::where(['id_ingredient'=>$id_ingredient])->get();
        foreach ($records as $record)
            $record->delete();
        return Response::json(['status'=>0,'msg'=>'delete '.$ingredient->id_ingredient.' successfully!']);
    }

    public function edit($id_ingredient, Request $request)
    {
        $ingredient = Ingredient::find($id_ingredient);
        return view('admin.ingredients.edit',['ingredient'=>$ingredient,'admin'=>$request->user()]);
    }

    public function update(Request $request, $id_ingredient)
    {
        $data = [
            'ingredient_name'=>$request['name'],
        ];
        $ingredient = Ingredient::find($id_ingredient);
        $ingredient->update($data);

        return back()->with('msg','update the ingredient successfully');
    }
}
