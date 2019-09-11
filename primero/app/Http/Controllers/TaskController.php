<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index() {
        // $tasks = [
        //     ['id' => 1, 'name' => 'practicar', 'description' => 'practicar mucho todos los días'],
        //     ['id' => 2,  'name' => 'estudiar', 'description' => 'estudiar un poco'],
        //     ['id' => 3,  'name' => 'limpiar', 'description' => 'limpiar el código / refactorizar'],
        // ];
        $tasks = Task::get();
        return response()->json( ["tasks" => $tasks ]);
    }

    public function store() {
        return response()->json( ["message" => "se guardó la tarea"] );
    }

    public function show( $id ) {
        $tasks = [
            [
                'id' => 1,
                'name' => 'practicar',
                'description' => 'practicar mucho todos los días'
            ],
            [
                'id' => 2,
                'name' => 'estudiar',
                'description' => 'estudiar un poco'
            ],
            [
                'id' => 3,
                'name' => 'limpiar',
                'description' => 'limpiar el código / refactorizar'
            ],
        ];
        $task = $tasks[$id -1] ;
        return response()->json( ["tasks" => $task ] ) ;
    }
}
