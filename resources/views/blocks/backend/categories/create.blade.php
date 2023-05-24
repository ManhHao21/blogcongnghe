
@extends('layouts.backend');
@section('head')
@section('danhsach')
Thêm mới danh mục
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
            @foreach ($category as $item)
            @if ($item->childrenCategories->count())
                <option value="{{$item->id}}">--{{$item->name}}</option>
            @else
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endif
            @endforeach
        </select>
      </div>
  </div>
      <button type="submit" class="btn btn-primary">Tạo danh mục</button>
      <button type="submit" class="btn btn-secondary"><a href="{{route('admin.category.index')}}" style="color: white; text-decoration: none;">Trở về</a></button>
  </form>
@endsection
