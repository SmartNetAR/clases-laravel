<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Validator;

class TaskController extends Controller
{
    public function index() {
        // $tasks = [
        //     ['id' => 1, 'name' => 'practicar', 'description' => 'practicar mucho todos los días'],
        //     ['id' => 2,  'name' => 'estudiar', 'description' => 'estudiar un poco'],
        //     ['id' => 3,  'name' => 'limpiar', 'description' => 'limpiar el código / refactorizar'],
        // ];
        $tasks = Task::get();
        return response()->json( ["tasks" => $tasks ], 200);
    }

    public function store( Request $request ) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:tasks'
        ]) ;

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 422);
        }








        $taskName =  $request['name'];
        if (!isset($taskName)) {
            return "debe incluir el nombre" ;
        }

        return $request['name'];
        //return response()->json( ["message" => "se guardó la tarea"] );
    }

    public function show( $id ) {
        $task = Task::find($id);

        if (!isset($task)) {
            return response()->json( ["message" => "Task not finded"] ) ;
        }

        return response()->json( ["tasks" => $task ] ) ;
    }
}
