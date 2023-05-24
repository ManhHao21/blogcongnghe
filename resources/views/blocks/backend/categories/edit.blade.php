
@extends('layouts.backend');
@section('head')
@section('danhsach')
Cập nhật danh mục
@endsection
@endsection
@section('content')
@if(session('msg'))
<div class="alert alert-success">
    {{session('msg')}}
</div>
@endif
<form action="{{route('admin.category.update', $categories->id)}}" method="post">
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
        <label for="category">Tên danh mục</label>
        <input type="text" name="name" class="form-control" id="category" value="{{$categories->name}}" placeholder="Nhập tên danh mục" value="">
        <div class="form-group">
          <label>Danh mục</label>
          <select class="form-control mb-3" name="parent_id">
            <option value="">Parent</option>
            @foreach ($category as $item)
              <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
          </select>
        </div>
        

      <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
      <button type="submit" class="btn btn-secondary"><a href="{{route('admin.category.index')}}" style="color: white; text-decoration: none;">Trở về</a></button>
  </form>
@endsection