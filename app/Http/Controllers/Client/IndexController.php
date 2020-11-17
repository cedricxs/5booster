<?php


namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Model\Post_Questionnaire;
use App\Mail\Contact_Coach;
use Faker\Provider\DateTime;
use  Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Http\Model\User;
use Illuminate\Support\Facades\Mail;
use Stripe\PaymentIntent;

class IndexController extends Controller
{
    public function client()
    {
        return view('client.sport');
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

    public function filtre(Request $request)
    {
        $user = $request->user();
        if($user->hasAbonner()&&!$user->hasRepondreQuestionnaire()){
            return view('client.repondre_questionnaire_svp');
        }
        else
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
    public function formulaire(Request $request)
    {
        $data = [
            'has_submit_questionnaire' => $request->user()->questionnaire,
            'redo_questionnaire' => false
        ];
        return view('client.formulaire')->with('has_submit_questionnaire',$data['has_submit_questionnaire'])
            ->with('redo_questionnaire',$data['redo_questionnaire']);
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

    public function post_questionnaire(Request $request)
    {
        $data = $request->all();
        foreach ($data as $question_id=>$answer) {
            $post = [
                'question_id'=>str_replace('question_','',$question_id),
                'user_id'=>$request->user()->user_id,
                'answer'=>$answer
            ];
            $exist = Post_Questionnaire::where(['user_id'=>$post['user_id'],'question_id'=>$post['question_id']])->get();
            if($exist->isEmpty())
                Post_Questionnaire::create($post);
            else{
                foreach ($exist as $exist){
                    $exist->answer = $post['answer'];
                    $exist->save();
                }
            }

        }
        $user = $request->user();
        $user->questionnaire = true;
        $user->save();

        return Response::json(['msg'=>'ok']);
    }

    public function reset_questionnaire(Request $request)
    {
        $all_posts = Post_Questionnaire::where('user_id',"=",$request->user()->user_id)->get();
        $data = [
            'has_submit_questionnaire' => $request->user()->questionnaire,
            'redo_questionnaire' => true,
            'all_posts'=>$all_posts
        ];
        return view('client.formulaire')->with('has_submit_questionnaire',$data['has_submit_questionnaire'])
            ->with('redo_questionnaire',$data['redo_questionnaire'])
            ->with('all_posts',$data['all_posts']);
    }

    public function ajouter_payment(Request $request)
    {
        $user = $request->user();

//        dd($user->paymentMethods());
//        if(isset($user)){
//            $stripeCustomer = $user->createOrGetStripeCustomer();
//            return $stripeCustomer;
//        }

        return view('update-payment-method', [
            'intent' => $user->createSetupIntent(['customer' => $user->stripe_id]),
        ]);

    }

    public function abonner($abonnement, Request $request)
    {
//        if(!$request->user()->hasPaymentMethod()){
//            return redirect('/client/ajoute_payment');
//        }
//        if($abonnement == 'free'){
//            return back();
//        }
//        if($request->user()->subscribed($abonnement)){
//            return back();
//        }
        return view('payment.payment_abonner',[
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
        $user = $request->user();
        $payment_intent = PaymentIntent::create([
            'payment_method_types' => ['alipay'],
            'amount' => 1099,
            'currency' => 'eur',
            'customer'=>$user->stripe_id,
            'description'=>'use alipay pay',
            'receipt_email'=>$user->email
        ],$user->stripeOptions());
        return view('payment.alipay',['payment_intent'=>$payment_intent,'user'=>$user]);
//        return view('payment.alipay',['amount'=>1500,
//            'currency'=>config('cashier.currency'),
//            'redirect_url'=>url('/client/payer/alipay_ready?amount=1500')]);
    }

    //建议使用webhook,不要将支付成功的处理逻辑放在此处,但是可以给用户显示一些提示信息。
    //因为一旦网络不好服务器可能接收不到支付,而用户已经扣款。但是webhook会检测服务器是否回应,所以更有保障
    //(当confirm_type为automatic时会自动扣款并重定向到此来处理支付成功逻辑,
    //但如果为nanual则此次paymentIntent的status会是requires_confirmation)
    public function alipay_ready(Request $request)
    {
        $user = $request->user();
        $payment_intent_id = $request['payment_intent'];
        $payment_intent = PaymentIntent::retrieve($payment_intent_id,$user->stripeOptions());
        if($payment_intent->status=='requires_action' || $payment_intent->status == 'requires_payment_method'){
            return Response::json(['msg'=>'fail to pay'],400);
        }
        //不需要再次confirm
        //$payment_intent->confirm();
        return Response::json(['msg'=>'ok'],200);

//        $user = $request->user();
//        $charge = $user->chargeWithSource($request['amount'], $request['source']);
//        return Response::json(['msg'=>'ok'],200);
    }

    //此处应为webhook
    public function webhook_alipay_ready(Request $request)
    {
//        $user = $request->user();
//        $user->chargeWithSource($request['amount'], $request['source']);
        $source = $request;
        $email = $source['email'];
        $user = User::first();
        $amount = $source['amount']??1500;
        $source_id = $source['source'];
        $user->chargeWithSource($amount, $source_id);
    }

    public function wechatpay(Request $request)
    {
        return view('payment.wechatpay',['amount'=>1500,
            'currency'=>config('cashier.currency'),
            'redirect_url'=>url('/client/payer/wechatpay_ready?amount=1500')]);

    }

    //wechat只能用source和charge接口支付
    //wechat的source只能通过webhook接收
    public function webhook_wechatpay_ready()
    {

    }
}
