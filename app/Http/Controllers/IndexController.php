<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Http\Model\User;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        return view('auth.login');
    }

    public function history()
    {
        return view('history');
    }

}
