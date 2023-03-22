
@extends('layouts.backend');
@section('head')
  
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
        <label for="name">name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Nhập tên" value="{{$user->id}}">
      </div>
      <div class="form-group">
        <label for="email">email</label>
        <input type="text" name="email" class="form-control" id="email" placeholder="Nhập email" value="{{$user->email}}" readonly>
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
          <input type="radio" name="is_admin" id="is_admin" value="0" @if(!$user->is_admin) checked @endif > User
        </label>
        <label class="radio-inline">
          <input type="radio" name="is_admin"  value="1" @if($user->is_admin) checked @endif > Admin
        </label>
      </div>
    </div>
      <button type="submit" class="btn btn-primary">Cập nhật người dùng</button>
      <button type="submit" class="btn btn-primary"><a href="{{route('admin.user.index')}}" style="color: white; text-decoration: none;">Trở về</a></button>
  </form>
@endsection