
@extends('layouts.backend');
@section('head')
@section('danhsach')
Tạo danh mục
@endsection
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
      <div class="form-group">
        <label for="menu">Tên Danh Mục</label>
        <input type="text" name="name" class="form-control" id="menu" placeholder="Nhập tên danh mục" value="">
      </div>
      <div class="form-group">
        <label>Danh mục cha</label>
        <select class="form-control" name="parent_id">
          <option value="">Parent</option>
              {!! $htmlOption !!}
        </select>
      </div>
  </div>
      <button type="submit" class="btn btn-primary">Tạo danh mục</button>
      <button type="submit" class="btn btn-secondary"><a href="{{route('admin.category.index')}}" style="color: white; text-decoration: none;">Trở về</a></button>
  </form>
@endsection
