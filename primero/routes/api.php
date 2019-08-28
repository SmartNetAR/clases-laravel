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


Route::get('/edad/{anyo}/{mes}', function ( $anyo, $mes ) {
    $fecha = getdate() ;
    // var_dump($fecha) ;
    // die() ;
    $anyoActual = $fecha["year"] ;
    // dd($fecha) ;
    return response()->json( ["anyo" => $anyoActual ]);
});

Route::get('/tasks', 'TaskController@index' );

Route::get('/tasks/{id}', 'TaskController@show' );

Route::post('/tasks', 'TaskController@store' );

