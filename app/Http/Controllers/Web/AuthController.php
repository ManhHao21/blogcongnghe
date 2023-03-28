<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function formLogin(){
        return view('blocks.fontend.login');
    }

    public function login(Request $request){
        if(Auth::attempt([
            'email'=> $request->email,
            'password' => $request->password,
        ])){
            return redirect('/');
        }
        return redirect() -> route('web.login')->with('msg', 'Đăng nhập không thành công');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
