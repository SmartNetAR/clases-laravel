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
// Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('users', 'UserController@index');

//Route::post('events', 'EventController@store');
//Route::post('comment', 'CommentController@store');//probando comentarios...


Route::group(['middleware' => 'auth:api'], function () {
    //Users
    Route::get('profile', 'UserController@profile');

    //Eventos
    Route::get('events', 'EventController@index');

    
    
    //Events
    Route::get('events', 'EventController@index');
    Route::post('events', 'EventController@store');
    // Route::get('events', 'EventController@index');
    
    //Inscriptions
    Route::post('inscription','UserInscription@inscription');


    //Coments
    Route::post('events/{event}/comment', 'CommentController@store');
});
