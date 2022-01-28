<?php

namespace App\Http\Controllers;
use App\Models\Message; 
use Illuminate\Http\Request;
use Auth; 

class MessageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "content" =>"required|min:10|max:500" , 
            "tags"=>"required|min:3|max:50"  , 
        ]); 
       $user = Auth::user(); 
       $message = new Message(); 
       $message->content = $request['content']; 
       $message->tags = $request['tags']; 
       $message->image = $request['image']; 
       $message->user_id = $user->id; 
       $message->save(); 
       return redirect()->route('home')->with('message', 'Your message have been added with succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       // $messages = Message::all();
        //return view('message.messages' , compact('messages'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $messages = Message::all();
        return view('message.messages' , compact('messages'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }



    // public function add_message(Request $request){
    //         $messages = Message::all(); 
    //         var_dump($messages->content); 
    //        // $messages->save(); 
    //        //return redirect()->route('account')->with('message', 'Your message have been added with succes');
    // }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
