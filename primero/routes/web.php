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

Route::get('/', function () {
    $a = 10 ;
    $b = 20 ;

    return $a + $b ;
});

Route::get('/edad/{anyo}/{mes}', function ( $anyo, $mes ) {

    $fecha = getdate() ;

    // var_dump($fecha) ;
    // die() ;

    $anyoActual = $fecha["year"] ;
    
    // dd($fecha) ;

    return response()->json( ["anyo" => $anyoActual ]);

});