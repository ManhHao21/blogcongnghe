
@extends('layouts.backend');
@section('head')
  
@endsection
@section('content')
<form action="{{route('admin.category.store')}}" method="post">
    @csrf
    @if(count($errors))
    <div class="alert alert-danger">
      @foreach($errors->all() as $err)
      {{$err}} <br>
      @endforeach
  </div>
    @endif
    <div class="card-body">
      <div class="form-group col-3">
        <label for="menu">Tên Danh Mục</label>
        <input type="text" name="name" class="form-control" id="menu" placeholder="Nhập tên danh mục" value="">
      </div>
      <div class="form-group col-3">
        <label for="parent_id">Danh mục cha</label>
        <input type="text" name="parent_id" class="form-control" id="menu" placeholder="Nhập  danh mục cha" value="">
      </div>
    </div>

      <button type="submit" class="btn btn-primary">Tạo danh mục</button>
  </form>
@endsection