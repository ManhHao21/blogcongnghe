<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('blocks.backend.login.index');
    }

    public function register(){
        return view('blocks.backend.register.index');
    }
    public function checkRegister(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|max:32',
            'password_confirm' => 'same:password',
        ],[
            'name.required' =>'Tên không được bỏ trống',
            'email.required' =>'Email không được bỏ trống',
            'email.unique' =>'Email đã tồn tại, xin hãy nhập lại',
            'email.email' =>'Xin hãy nhập lại email',
            'email.same' =>'Email đã tồn tại, xin hãy nhập lại',
            'password.required' =>'Mật khẩu không được bỏ trống',
            'password.min' =>'Mật khẩu phải lớn hơn 6 kí tự, xin hãy nhập lại',
            'password.same' =>'Mật khẩu nhập lại không trùng, xin hãy nhập lại',
        ]);

        User::create([
            'name'=> $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'address' =>$request->address,
            'sdt' =>$request->phone,
            'sex' => $request->has('sex') ? 0: 1, 
        ]);
        // dd($request);
        return view('blocks.backend.login.index')->with('msg', 'Đăng kí tài khoản thành công');
    }

    public function checkLogin(Request $request){
        if(Auth::attempt([
            'email'=> $request->email,
            'password' => $request->password,
        ])){
            $user = User::all();
            return redirect() ->route('admin.charAt');
        }
        return redirect() -> route('admin.login')->with('msg', 'Đăng nhập không thành công');
    }

    public function logout(){
        Auth::logout();
        return redirect() ->route('admin.login');
    }
}
