<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class AuthController extends Controller
{
    
    
    public function showlogin(){
        return view('admin.auth.login');
    }

    public function postLogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect(url('/admin'))->with('success','You are Login as Admin');
        }else{
            return redirect(url('/admin/login'));
        }
    }

    public function logout(){
        Auth::logout();

        return redirect(url('/'));
    }
public function __construct(){
    $this->middleware('guest')->except('logout');
}
    public function guard(){
        return Auth::guard('admin');
    }
}