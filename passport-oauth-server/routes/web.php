<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

//Route::get('/developers','DevelopersController@index');

Auth::routes();

Route::get('/redirect', function () {

    $query = http_build_query([
                                  'client_id' => '3',
                                  'redirect_uri' => 'http://localhost:9988/callback.php',//client
                                  'response_type' => 'code',
                                  'scope' => ''
                              ]);

    return redirect('http://localhost:8886/oauth/authorize?'.$query); //server
});

Route::get('/oauth','BSRUauthController@index');
