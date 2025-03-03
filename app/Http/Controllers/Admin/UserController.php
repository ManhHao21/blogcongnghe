<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function index(){
        if (Auth::user()->is_admin == 1 ){
            $user = User::paginate(3);
        }
        else {
            return redirect() ->route('admin.post.index');
        }
        return view('blocks.backend.user.index', compact('user'));
    }

    public function create(){
        if (Auth::user()->is_admin == 1 ){
            return view('blocks.backend.user.create');
        }
        else if(Auth::user()->is_admin == 0){
            return redirect() ->route('admin.post.index');
        }
       
    }

    public function store(Request $request){
        // dd($request);
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
            'is_admin' =>$request->is_admin,
            'address' =>$request->address,
            'sdt' =>$request->phone,
            'sex' => $request->has('sex') ? 0: 1, 
        ]);
        // dd($request);
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
            'is_admin' =>$request->is_admin,
            'address' =>$request->address,
            'sdt' =>$request->phone,
            'sex' => $request->sex, 
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
        return redirect() ->route('admin.user.index', $user->id)->with('msg', 'cập nhật người dùng thành công');
    }

    public function delete($id){
        $user = User::where('id', $id)->first();
        return view('blocks.backend.user.delete', compact('user'));
    }

    public function deleteUser($id){
        User::where('id', $id)->delete();
        return redirect()->route('admin.user.index')->with('msg', 'Xóa người dùng thành công');
    }
}
