<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Comment;
use Auth;
use App\Event;

class CommentController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
              'comment'=>'required'
              
          ]);
          if ($validator->fails()){
             return response()->json(['error'=>$validator->errors()],422);
          }
           //$event
           $user = Auth::user();

          
       $comment = new Comment;
       $comment->comment = $request ->comment;
       $comment->valoration = 0;
       $comment->date_time = '10/12/21';
       $comment->user_id = $user->id;
       $comment->event_id = 1;

        $comment->save();
          
        return response()->json(['comment'=>$comment]);
            
        
        }
}
