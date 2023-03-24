
@extends('layouts.backend');
@section('head')
  
@endsection
@section('content')
@if(session('msg'))
<div class="alert alert-success">
    {{session('msg')}}
</div>
@endif
<form action="{{route('admin.category.update', $category->id)}}" method="post">
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
      <div class="form-group col-3">
        <label for="category">Tên Danh Mục</label>
        <input type="text" name="name" class="form-control" id="category" value="{{$category->name}}" placeholder="Nhập tên danh mục" value="">
      </div>
      <div class="form-group col-3">
        <label for="parent_id">Danh mục cha</label>
        <input type="text" name="parent_id" class="form-control" id="parent_id" value="{{$category->parent_id}}" placeholder="Nhập danh mục cha" value="">
      </div>
    </div>

      <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
      <button type="submit" class="btn btn-primary"><a href="{{route('admin.category.index')}}" style="color: white; text-decoration: none;">Trở về</a></button>
  </form>
@endsection