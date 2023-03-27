
@extends('layouts.backend');
@section('head')
  
@endsection
@section('content')
<form action="{{route('admin.user.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    @if(count($errors))
    <div class="alert alert-danger">
      @foreach($errors->all() as $err)
      {{$err}} <br>
      @endforeach
  </div>
    @endif
    <div class="card-body">
      <div class="form-group">
        <label for="name">name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Nhập tên" value="">
      </div>
      <div class="form-group">
        <label for="email">email</label>
        <input type="text" name="email" class="form-control" id="email" placeholder="Nhập email" value="">
      </div>
      <div class="form-group">
        <label for="password">password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Nhập password" value="">
      </div>
      <div class="form-group">
        <label for="password_confirm">password_confirm</label>
        <input type="password" name="password_confirm" class="form-control" id="password_confirm" placeholder="Nhập lại password" value="">
      </div>

      <div class="form-group">
        <label for="is_admin">is admin</label>
        <label class="radio-inline">
          <input type="radio" name="is_admin" id="is_admin" value="0" checked> User
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