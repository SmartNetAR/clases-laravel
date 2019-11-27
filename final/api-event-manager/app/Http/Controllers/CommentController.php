<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Comment;
use Auth;
use App\User;
use App\Event;

class CommentController extends Controller
{
    public function store(Request $request,$eventid){
        $validator = Validator::make($request->all(),[
              'comment'=>'required'
              
          ]);
          if ($validator->fails()){
             return response()->json(['error'=>$validator->errors()],422);
          }
           //$event = Event::;
           $user = Auth::user();
           
          
       $comment = new Comment;
       $comment->comment = $request ->comment;
       $comment->valoration = 0;
       $comment->date_time = date('Y-m-d_H:i') ;
       $comment->user_id = $user->id;
       $comment->event_id = $eventid;

        $comment->save();

          
        return response()->json(['comment'=>$comment]);
            
        
        }

    public function destroy(Request $request,$commentID){
         
        if($user=Auth::user()){
          
        }
           
        

    }
}
