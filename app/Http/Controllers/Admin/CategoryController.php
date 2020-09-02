<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\SportCategory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Get all Categories
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $categories = SportCategory::paginate(5);
        return view('admin.categories.index',['data'=>$categories,'admin'=>$request->user()]);
    }

    public function create(Request $request)
    {
        return view('admin.categories.create')->with(['admin'=>$request->user()]);
    }

    public function destroy($category_id)
    {
        $category = SportCategory::find($category_id);
        $category->delete();
        return Response::json(['status'=>0,'msg'=>'delete '.$category->sport_category_name.' successfully!']);
    }

    public function store(Request $request)
    {
        $data = [
            'id_sport_category'=>SportCategory::max('id_sport_category')+1,
            'sport_category_name'=>$request['title']
        ];

        SportCategory::create($data);
        return back()->with('msg','add the sport category successfully');
    }

    public function edit($category_id, Request $request)
    {
        $category = SportCategory::find($category_id);
        return view('admin.categories.edit',['category'=>$category,'admin'=>$request->user()]);
    }

    public function update(Request $request,$category_id)
    {
        $data = [
            'sport_category_name'=>$request['title'],
        ];
        $category = SportCategory::find($category_id);

        $category->update($data);
        return back()->with('msg','update the sport category successfully');
    }
}
