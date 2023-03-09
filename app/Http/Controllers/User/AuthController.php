<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    

    public function showlogin(){
        return view('user.auth.login');
    }

    public function postlogin(Request $request){
        $request->validate([
            
            'email'=>'required',
            'password'=>'required',
    
        ]);
    if(User::where('email',$request->email)->first()){
        //attempt email
        if(Auth::attempt($request->only('email','password'))){
            //redirect link when user login
            return redirect('/')->with('success','You are Login as User');
        }else{
            //if incorrect password
            return redirect('/login')->with('error','Password Not Found!');
        }
    }else{
        //if not have email 
        return redirect('/login')->with('error','Email Not Found!');
    }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login')->with('logout','You are Logout');
    }

    public function showregister(){
        return view('user.auth.register');
    }

    public function postregister(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min:6|max:20',
            'image'=>'required|mimes:png,jpg,jpeg'
        ]);

        $file=$request->file('image');
        $file_name=uniqid(time()).$file->getClientOriginalName();
        $path='images/'.$file_name;
        
        $file->storeAs('images',$file_name);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'image'=>$path
        ]);

        return redirect(url('/login'))->with('success','Register Successful. Now, You can Login.');
    }
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }
    public function guard(){
        return Auth::guard('web');
    }
 }