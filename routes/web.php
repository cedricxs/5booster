<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\App;
Route::middleware(['web','guest'])->get('/','IndexController@index');

Route::middleware('web')->get('/history','IndexController@history');

Route::group(['prefix'=>'client','namespace'=>'Client','middleware'=>['web','auth']],function (){
    Route::get('/','IndexController@client');
    Route::get('/espace','IndexController@espace');
    Route::get('/sport','IndexController@sport');
    Route::get('/filtre','IndexController@filtre');
    Route::get('/tendances','IndexController@tendances');
    Route::get('/prog_perso','IndexController@prog_perso');
    Route::get('/recettes','IndexController@recettes');
    Route::get('/perso','IndexController@perso');
    Route::get('/coach','IndexController@coach');
    Route::get('/formulaire','IndexController@formulaire');
    Route::get('/abonnement','IndexController@abonnement');
    Route::get('/ajouter_payment','IndexController@ajouter_payment')->middleware('verify_email');
    Route::get('/abonner/{abonnement}','IndexController@abonner')->middleware('verify_email');
    Route::get('/payment/succeeded','IndexController@succeeded')->middleware('verify_email');
    Route::get('/payment/failed','IndexController@failed')->middleware('verify_email');
    Route::get('/invoice/{invoice_id}','IndexController@invoice')->middleware('verify_email');
    Route::post('/contact_coach','IndexController@contact_coach');
    Route::get('/payer/alipay','IndexController@alipay')->middleware('verify_email');
    Route::get('/payer/alipay_ready','IndexController@alipay_ready')->middleware('verify_email');
    Route::get('/payer/wechatpay','IndexController@wechatpay')->middleware('verify_email');
    Route::get('/payer/allPaymentMethod',function (\Illuminate\Http\Request $request){
        //$request->user()->deletePaymentMethods();
           dd($request->user()->paymentMethods());
           dd('no');
    })->middleware('verify_email');
    Route::post('/questionnaire','IndexController@post_questionnaire');
    Route::get('reset_questionnaire','IndexController@reset_questionnaire');
});
Route::middleware('web')->post('/payer/alipay','Client\IndexController@alipay_ready');
Auth::routes(['verify'=>true]);
Route::get('/logout','Auth\LoginController@logout');
Route::group(['prefix'=>'admin','middleware'=>['web','auth','admin'], 'namespace'=>'Admin'], function (){
    Route::get('/','IndexController@index');
    Route::resource('/programs','ProgramController');
    Route::resource('/recettes','RecetteController');
    Route::resource('/niveau','ProgramNiveauController');
    Route::resource('/object','ProgramObjectController');
    Route::resource('/codepromos','CodePromoController');
    Route::resource('/ingredients','IngredientController');
    Route::get('/programscell','ProgramController@indexCell');
});
Route::get('/recette/view/{id}','Client\RecetteController@getById');
Route::get('/recette/download/{id}','Client\RecetteController@download');
































Route::get('ex',function(){
    return view('example');
});
Route::get('app',function(){
    $app = App::getFacadeApplication();
//    $class = new \ReflectionClass($app);
//    $methods = $class->getMethods();
//    $provider = $app->make('ppp');
//    dd($provider);
//    return $app->serviceProviders;
//    dd($provider);
    $request = $app->make('Illuminate\Http\Request');
    dd($request);
});
