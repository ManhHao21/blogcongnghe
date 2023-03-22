<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = User::all();
        return view('blocks.backend.user.index', compact('user'));
    }

    public function create(){
        return view('blocks.backend.user.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|max:32',
            'password_confirm' => 'same:password',
            'is_admin' => 'required',
        ],[
            'name.required' =>'tên không được bỏ trống',
            'email.required' =>'email không được bỏ trống',
            'email.unique' =>'email đã tồn tại, xin hãy nhập lại',
            'email.email' =>'xin hãy nhập lại email',
            'email.same' =>'email đã tồn tại, xin hãy nhập lại',
            'password.required' =>'Mật khẩu không được bỏ trống',
            'password.min' =>'Mật khẩu phải lớn hơn 6 kí tự, xin hãy nhập lại',
            'password.same' =>'mật khẩu nhập lại không trùng, xin hãy nhập lại',
            'is_admin.required' =>'hãy tích vào, không được bỏ trống',
        ]);

        User::create([
            'name'=> $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' =>$request->is_admin
        ]);
        return redirect() ->route('admin.user.index')->with('msg', 'tạo người dùng thành công');
    }

    public function edit($id){
        $user = User::find($id);
        return view('blocks.backend.user.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'is_admin' => 'required',
        ],[
            'name.required' =>'tên không được bỏ trống',
            'is_admin.required' =>'hãy tích vào, không được bỏ trống',
        ]);
        $user = User::find($id);
        $data = [
            'name' => $request->name,
            'is_admin' =>$request->is_admin
        ];

        if($request->password){
            $this->validate($request, [
            'password' => 'required|min:6|max:32',
            'password_confirm' => 'same:password',
            ],[
                'password.required' =>'Mật khẩu không được bỏ trống',
                'password.min' =>'Mật khẩu phải lớn hơn 6 kí tự, xin hãy nhập lại',
                'password.max' =>'Mật khẩu tối đa 32 kí tự, xin hãy nhập lại',
                'password.same' =>'mật khẩu nhập lại không trùng, xin hãy nhập lại',
            ]);
            $data = [
                'password' => bcrypt($request->password)
            ];
        }
        $user ->update($data);
        return redirect() ->route('admin.user.edit', $user->id)->with('msg', 'cập nhật người dùng thành công');
    }

    public function delete($id){
        User::where('id', $id)->delete();
        return redirect()->route('admin.user.index')->with('msg', 'Xóa người dùng thành công');
    }
}
