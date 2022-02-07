<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Auth;

class MessageController extends Controller
{



    public function show(Request $request)
    {
        $search = $request->input('search');
        $messages = Message::where('content','LIKE', "%$search%")
        ->orWhere('tags','LIKE', "%$search%")
        ->with('user', 'comments.user')->latest()->paginate(10);
        //dd($messages);
        return view("home", compact("messages"));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "content" => "required|min:10|max:500",
            "tags" => "required|min:3|max:50",
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        return view('message.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        $request->validate([
            "content" => "required|min:10|max:500",
            "tags" => "required|min:3|max:50",
        ]);
        //verif 
        if ($request->input('content') !== $message->content) {
            $message->content = $request->input('content');
            $message->tags = $request->input('tags');
            $message->image = $request->input('image');
            $message->save();
            return redirect()->route('home')->with('message', 'Your message have been updated with succes');
        } else {
            return redirect()->back()->with('error', "Your message is the same as the current one!");
        }
    }




    // public function search(Request $request)
    // {
    //     $search = $request->input('search');
    //     $message = Message::query()->where("%{$search}%");
    //     dd($message);
    //     return view("home", compact("messages"));
    // }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();
        return redirect()->back()->with('message', "Your message have been deleted with succes");
    }
}
