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

Route::group(['prefix'=>'client','namespace'=>'client','middleware'=>['web','auth']],function (){
    Route::get('/','IndexController@client');
    Route::get('/espace','IndexController@espace');
    Route::get('/sport','IndexController@sport');
    Route::get('/filtre','IndexController@filtre');
    Route::get('/tendances','IndexController@tendances');
    Route::get('/prog_perso','IndexController@prog_perso');
    Route::get('/recettes','IndexController@recettes');
    Route::get('/perso','IndexController@perso');
    Route::get('/coach','IndexController@coach');
    Route::get('/rdv','IndexController@rdv');
    Route::get('/formulaire','IndexController@formulaire');
    Route::get('/abonnement','IndexController@abonnement');
    Route::get('/ajouter_payment','IndexController@ajouter_payment');
    Route::get('/abonner/{abonnement}','IndexController@abonner');
    Route::get('/payment/succeeded','IndexController@succeeded');
    Route::get('/payment/failed','IndexController@failed');
    Route::get('/invoice/{invoice_id}','IndexController@invoice');
});

Auth::routes(['verify'=>true]);



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
