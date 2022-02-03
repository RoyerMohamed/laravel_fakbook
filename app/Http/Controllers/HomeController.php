<?php

namespace App\Http\Controllers;
use App\Models\Message; 

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
        //$messages = Message::with('user', 'comments.user')->get();
        
        //eager loading
        $messages =  Message::with('user')->get();
        //dd($messages); 
        return view('home' , compact('messages'));
    }

}
