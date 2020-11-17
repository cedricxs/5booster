<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware'=>['api']],function (){
    Route::get('/profile','ApiController@getProfile');
    Route::get('/program','ApiController@getPrograms')->middleware('api.subscribed');
    Route::get('/allthemes/{themeId}','ApiController@getThemes')->middleware('api.subscribed');
    Route::get('/theme/{themeId}','ApiController@getThemeById')->middleware('api.subscribed');
    Route::post('/theme/{themeId}','ApiController@unlockTheme')->middleware('api.subscribed');
    Route::get('/allmindsetprograms/{themeId}','ApiController@getMindsetPrograms')->middleware('api.subscribed');
    Route::get('/mindsetprogram/{mindsetprogramId}','ApiController@getMindsetProgramsById')->middleware('api.subscribed');
    Route::get('/recettes','ApiController@getRecettes');
    Route::get('/questionnaire','ApiController@getQuestionnaire');
    Route::post('/setupIntent','ApiController@setupIntent');
    Route::post('/subscription','ApiController@abonner');
    Route::get('/subscriptionBydefault','ApiController@abonnerByDefaultPaymentmethod');
    Route::get('/subscription/{subName}','ApiController@getAbonnement');
    Route::delete('/subscription/{subName}','ApiController@cancelAbonnement');
    Route::post('/change_locale','ApiController@change_locale');
    Route::get('/invoice','ApiController@all_Invoices');
    Route::get('/allpaymentcards','ApiController@allPaymentMethods');
    Route::get('/defaultpaymentcard','ApiController@defautPaymentPcard');
    Route::patch('/defaultpaymentcard','ApiController@updateDefaultPaymentPcard');
});

