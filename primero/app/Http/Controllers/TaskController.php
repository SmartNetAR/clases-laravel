<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() {
        $tasks = [ 
            'practicar',
            'estudiar' 
        ];
        return response()->json( ["tasks" => $tasks ]);
    }

    public function store() {
        return response()->json( ["message" => "se guardó la tarea"] );
    }

    public function show( $id ) {
        $task = $id ;
        return response()->json( ["tasks" => $task ] ) ;
    }   
}
