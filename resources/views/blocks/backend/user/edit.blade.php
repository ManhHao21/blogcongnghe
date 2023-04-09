
@extends('layouts.backend');
@section('head')
@section('danhsach')
cập nhật người dùng
@endsection
@endsection
@section('content')
        @if(session('msg'))
            <div class="alert alert-success">
                {{session('msg')}}
            </div>
        @endif
<form action="{{route('admin.user.update', $user->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    @if(count($errors))
    <div class="alert alert-danger">
      @foreach($errors->all() as $err)
      {{$err}} <br>
      @endforeach
  </div>
    @endif
    <div class="card-body">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Nhập tên" value="{{$user->id}}">
      </div>
      <div class="form-group">
        <label for="email">email</label>
        <input type="text" name="email" class="form-control" id="email" placeholder="Nhập email" value="{{$user->email}}" readonly>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Nhập password" value=""readonly >
      </div>
      <div class="form-group">
        <label for="password_confirm">Password_confirm</label>
        <input type="password" name="password_confirm" class="form-control" id="password_confirm" placeholder="Nhập lại password" value=""readonly >
      </div>
      <div class="form-group">
        <label for="address">Địa chỉ</label>
        <input type="text" name="address" class="form-control" id="address" placeholder="Nhập địa chỉ" value="{{$user->address}}">
      </div>
      <div class="form-group">
        <label for="phone">Số dien thoai</label>
        <input type="text" name="phone" class="form-control" id="phone" placeholder="Nhập số điện thoại" value="{{$user->sdt}}">
      </div>
      <div class="form-group">
        <label for="sex">Giới tính</label>
        <label class="radio-inline">
          <input type="radio" name="sex" id="sex" value="0" @if($user->sex) checked @endif> Nam
        </label>
        <label class="radio-inline">
          <input type="radio" name="sex" id="sex"  value="1"> nữ
        </label>
      </div>
      <div class="form-group">
        <label for="is_admin">is admin</label>
        <label class="radio-inline">
          <input type="radio" name="is_admin" id="is_admin" value="0" @if(!$user->is_admin) checked @endif > User
        </label>
        <label class="radio-inline">
          <input type="radio" name="is_admin"  value="1" @if($user->is_admin) checked @endif > Admin
        </label>
      </div>
    </div>
      <button type="submit" class="btn btn-primary">Cập nhật người dùng</button>
      <button type="submit" class="btn btn-secondary"><a href="{{route('admin.user.index')}}" style="color: white; text-decoration: none;">Trở về</a></button>
  </form>
@endsection