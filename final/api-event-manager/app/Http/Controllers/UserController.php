<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;

class UserController extends Controller
{
    public function login() {
        dd('casa');

    }

    public function index() {
        $users = User::all();
        return response()->json(['users'=>$users], 200);
    }

    public function register(Request $request)
    { 
        $validator = Validator::make($request->all(), [ //creamos la validación
            'name' => 'required', 
            'email' => 'required|email',
            // 'country' => 'required',
            // 'state' => 'required',
            // 'city' => 'required',
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);
        if ($validator->fails()) {//validamos
            return response()->json(['error'=>$validator->errors()], 401);
        }
        
        //creamos el usuario
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
    
        //creamos el token y se lo enviamos al usuario
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        return response()->json(['success'=>$success], 200);
    }
}
