<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;

class IndexController extends Controller{

    public function index(Request $request)
    {
        return view('admin.accueil')->with(['admin'=>$request->user()]);
    }


}
