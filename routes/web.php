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

use Illuminate\Support\Facades\Auth;

Route::middleware(['web','guest'])->get('/','IndexController@index');

Route::middleware('web')->get('/history','IndexController@history');

Route::middleware(['web','auth'])->get('/client','IndexController@client');

Route::middleware(['web','auth'])->get('client_espace','IndexController@client_espace');

Route::middleware(['web','auth'])->get('abonnement','IndexController@abonnement');
Auth::routes();
