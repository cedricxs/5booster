<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function history()
    {
        return view('history');
    }

    public function register()
    {
        return view('register');
    }
    public function client()
    {
        return view('client.index');
    }

    public function client_espace()
    {
        $user = Auth::guard()->getUser();
        return view('client.compte')->with('user',$user);
    }

    public function abonnement(){
        return view('client.abonnement');
    }
}
