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
Route::get('/programs','ApiController@getPrograms');
Route::get('/recettes','ApiController@getRecettes');
Route::get('/questionnaire','ApiController@getQuestionnaire');
Route::post('/setupIntent','ApiController@setupIntent');
Route::post('/abonner','ApiController@abonner');
Route::post('/change_locale','ApiController@change_locale');
