<?php


namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\Contact_Coach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Http\Model\User;
use Illuminate\Support\Facades\Mail;
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
        $user = $request->user();
        return view('client.abonnement',['user'=>$user]);
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

    public function contact_coach(Request $request)
    {
        $subject = $request['subject'];
        $content = $request['content'];
        $user = $request->user();
        $message = new Contact_Coach($subject, $content,$user);
        Mail::to(config('mail.coach'))->send($message);
        return back()->with('msg','You have sent the email to the coach.');
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
        if($abonnement == 'free'){
            return back();
        }
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

    public function alipay(Request $request)
    {
        return view('payment.alipay',['amount'=>1500,
            'currency'=>config('cashier.currency'),
            'redirect_url'=>url('/client/payment/succeeded')]);
    }

    public function alipay_ready(Request $request)
    {
//        $user = $request->user();
//        $user->chargeWithSource($request['amount'], $request['source']);
        $source = $request;
        $email = $source['email'];
        $user = User::where('email',$email)->first();
        $amount = $source['amount'];
        $source_id = $source['id'];
        $user->chargeWithSource($amount, $source_id);
    }
}
