
@extends('layouts.backend');
@section('head')
  
@endsection
@section('danhsach')
    Xóa danh mục
@endsection
@section('title')
    Danh mục
@endsection
@section('content')
<div class="card mb-4">
   
</div>
@if(session('msg'))
<div class="alert alert-success ">
    {{session('msg')}}
</div>
@endif
<div class="card mb-4">
    <div class="card-body">
        <button type="button" class="btn btn-block btn-primary ml-3 mb-3"><a href="{{route('admin.category.create')}}" style="color: white; text-decoration: none;">Thêm Danh Mục</a></button>
        
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>tên Danh mục</th>
                    <th>Danh mục cha</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$categories->id}}</td>
                    <td>{{$categories->name}}</td>
                    <td>{{$categories->parent_id}}</td>
                    <td class="">
                        <form action="{{ route('admin.category.deletepost', $categories->id) }}" method="POST">
                            @csrf
                            <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                        <button type="submit" class="btn btn-secondary btn-sm"><a href="{{route('admin.category.index')}}" style="color: white; text-decoration: none;">Trở về</a></button>
                    </td> 
                </tr> 
            </tbody>
        </table>
    </div>
</div>
@endsection