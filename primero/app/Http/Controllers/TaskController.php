<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Validator;

class TaskController extends Controller
{
    public function index() {
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

        $task = new Task;

        $task->name = $request->name;
        $task->description = $request->description;
        $task->priority = $request->priority;
        $task->status = $request->status;

        $task->save();

        return response()->json( ["tasks" => $task ], 200 ) ;
    }

    public function show( $id ) {
        $task = Task::find($id);

        if (!isset($task)) {
            return response()->json( ["message" => "Task not finded"] ) ;
        }

        return response()->json( ["tasks" => $task ] ) ;
    }
}
