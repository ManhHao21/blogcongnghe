
@extends('layouts.backend');
@section('head')
@section('danhsach')
Thêm người dùng
@endsection
@endsection
@section('content')
<form action="{{route('admin.user.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    
    <div class="card-body">
      <div class="form-group mb-3">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Nhập tên" value="">
      </div>
      <div class="form-group mb-3">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" id="email" placeholder="Nhập email" value="">
      </div>
      <div class="form-group mb-3">
        <label for="address">Địa chỉ</label>
        <input type="text" name="address" class="form-control" id="address" placeholder="Nhập địa chỉ" value="">
      </div>
      <div class="form-group mb-3">
        <label for="phone">Số điện thoại</label>
        <input type="text" name="phone" class="form-control" id="phone" placeholder="Nhập số điện thoại" value="">
      </div>
      <div class="form-group mb-3">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Nhập password" value="">
      </div>
      <div class="form-group mb-3">
        <label for="password_confirm">Password_confirm</label>
        <input type="password" name="password_confirm" class="form-control" id="password_confirm" placeholder="Nhập lại password" value="">
      </div>
      
      <div class="form-group mb-3">
        <label for="sex">Giới tính</label>
        <label class="radio-inline">
          <input type="radio" name="sex" id="sex" value="1"  checked> Nam
        </label>
        <label class="radio-inline">
          <input type="radio" name="sex"  value="0" checked> Nữ
        </label>
      </div>
      

      <div class="form-group">
        <label for="is_admin">Is admin</label>
        <label class="radio-inline">
          <input type="radio" name="is_admin" id="is_admin" value="0" checked> Nhân viên
        </label>
        <label class="radio-inline">
          <input type="radio" name="is_admin"  value="1" checked> Admin
        </label>
      </div>
    </div>
      <button type="submit" class="btn btn-primary">Tạo người dùng</button>
      <button type="submit" class="btn btn-secondary"><a href="{{route('admin.category.index')}}" style="color: white; text-decoration: none;">Trở về</a></button>
  </form>
@endsection