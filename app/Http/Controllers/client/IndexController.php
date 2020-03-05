<?php


namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Http\Model\User;
use Stripe\Stripe;

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

    public function abonnement(Request $request){
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

    public function ajouter_payment(Request $request)
    {
        $user = $request->user();
        //        dd($user->paymentMethods());

//        dd($user->paymentMethods());
//        if(isset($user)){
//            $stripeCustomer = $user->createOrGetStripeCustomer();
//            return $stripeCustomer;
//        }

        return view('update-payment-method', [
            'intent' => $user->createSetupIntent(),
        ]);

    }

    public function abonner($abonnement, Request $request)
    {
//        if(!$request->user()->hasPaymentMethod()){
//            return redirect('/client/ajoute_payment');
//        }
        return view('payment.payment_once',[
            'abonnement' => $abonnement,
        ]);
    }

    public function succeeded(Request $request)
    {
        $user = $request->user();
        $invs = $user->invoices();
        $inv = $invs[0];
        //$items = $invs[0]->lines['data'];
        return view('payment.succeeded',['inv'=>$inv]);
    }
    public function failed()
    {
        return view('payment.failed');
    }

    public function invoice($invoice_id, Request $request)
    {
        return $request->user()->downloadInvoice($invoice_id, [
            'vendor' => '5booster',
            'product' => 'boost',
        ]);
    }
}
