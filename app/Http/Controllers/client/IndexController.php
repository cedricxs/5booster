<?php


namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Model\User;

class IndexController extends Controller
{
    public function client()
    {
        return view('client.index');
    }

    public function espace()
    {
        $user = Auth::guard()->getUser();
        return view('client.compte')->with('user',$user);
    }

    public function abonnement(){
        return view('client.abonnement');
    }

    public function sport(){
        return view('client.sport');
    }

    public function filtre()
    {
        return view('client.filtre');
    }
    public function recettes()
    {
        return view('client.recettes');
    }
    public function perso()
    {
        return view('client.perso');
    }
    public function coach()
    {
        return view('client.coach');
    }
    public function rdv()
    {
        return view('client.rdv');
    }
    public function formulaire()
    {
        return view('client.formulaire');
    }
    public function tendances()
    {
        return view('client.tendances');
    }
    public function prog_perso()
    {
        return view('client.prog_perso');
    }
}
