<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;


class user_inscription extends Controller

{
    public function inscription(Request $request)
    { 
        $validator = Validator::make($request->all(), [ //creamos la validación
            'name' => 'required', 
            'email' => 'required|email',
             'country' => 'required',
             'state' => 'required',
             'city' => 'required',
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

    public function profile() {
        $user = Auth::user(); 
        return response()->json(['success' => $user], 200); 
    }
}
