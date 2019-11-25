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

Route::post('events', 'EventController@store');
Route::post('comment', 'CommentController@store');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('profile', 'UserController@profile');

    //Eventos
    Route::get('events', 'EventController@index');

    //Route::post('comment', 'CommentController@store');
    // Route::get('events', 'EventController@index');
    
});
