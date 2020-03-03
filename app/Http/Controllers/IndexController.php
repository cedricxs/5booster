<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Model\User;

class IndexController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function history()
    {
        return view('history');
    }

}
