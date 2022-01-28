<?php

namespace App\Http\Controllers;
use Auth;
use Hash; 
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;

class UserController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){
        $user = Auth::user(); 
        return view('user.account' , compact('user'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(){
        $user = Auth::user(); 
        return view('user.edit' , compact('user')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request){

        $request->validate([
            'first_name' => 'required|min:3|max:50',
            'last_name' => 'required|min:3|max:50',
            'edit_image'=> 'min:3|max:50'
        ]);
        $user = Auth::user(); 
        $user->first_name = $request->input('first_name');  
        $user->last_name = $request->input('last_name');
        $user->image = $request->input('image');
        $user->save();
        return redirect()->route('account')->with('message', 'Your modification has well succes');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }


    public function updatePassword(Request $request){
        $user = Auth::user(); 

        $request->validate([
            'oldpassword' => 'required|min:3|max:50',
            'newPassword' => 'required|min:3|max:50',
            'ConfirmPassword'=>['required', Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()]
        ]);
        //verif 
        if(Hash::check($request->input('oldpassword') , $user->password) ){
            if($request->input('newPassword') !== $request->input('oldpassword')){
                $user->password = Hash::make($request->input('newPassword'));  
                $user->save();
                return redirect()->route('account')->with('message', 'Your password change has well succes');
            }else{
                return redirect()->back()->withErrors(['password_error', 'Your current password and your old passeword are the same!']);
            }           
        }else{
            return redirect()->back()->with('error', "Your current password is incorrect "); 
        }

    }
}
