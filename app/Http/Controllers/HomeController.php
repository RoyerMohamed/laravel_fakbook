<?php

namespace App\Http\Controllers;
use App\Models\Message; 
use App\Models\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['home']);
        $this->middleware('guest')->only(['index']);
        }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        //nested eager loading
        $messages = Message::with('user', 'comments.user')->latest()->paginate(4);
        
        //eager loading
        //$messages =  Message::with('user', 'comment.user')->get();
       
        return view('home' , compact('messages'));
    }

}
