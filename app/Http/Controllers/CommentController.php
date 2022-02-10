<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message; 
use App\Models\Comment; 
use Auth; 

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $request->validate([
            "content" =>"required|min:10|max:500" , 
            "tags"=>"required|min:3|max:50"  , 
        ]); 
       $user = Auth::user(); 
       $comment  = new Comment(); 
       $comment->content = $request['content']; 
       $comment->tags = $request['tags']; 
       $comment->image = $request['image']; 
       $comment->user_id = $user->id; 
       $comment->message_id = $request['message_id']; 
       $comment->save(); 
       return redirect()->route('home')->with('message', 'Your comment have been added with succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    
        // return view('home' , compact("comment")); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('comment.edit' , compact("comment")); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            "content" =>"required|min:10|max:500" , 
            "tags"=>"required|min:3|max:50" , 
        ]);
        //verif 
        if($request->input('content') !== $comment->content ){
            $comment->content = $request->input('content'); 
            $comment->tags = $request->input('tags'); 
            $comment->image = $request->input('image'); 
            $comment->save();
            return redirect()->route('home')->with('message', 'Your comment have been updated with succes');
        }else{
            return redirect()->back()->with('error', "Your comment is the same as the current one!"); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id); 
        $comment->delete();
        return redirect()->route('home')->with('message', 'Your comment have been deleted with succes'); 
    }
}
