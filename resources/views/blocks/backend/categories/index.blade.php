
@extends('layouts.backend');
@section('head')
  
@endsection
@section('danhsach')
    Danh sách danh mục
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
               @foreach ($categories as $key=>$item)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->parent_id}}</td>
                    <td>
                        <a  href="{{route('admin.category.delete', $item->id)}}" class="btn btn-danger btn-sm hiden">Xóa</a>
                       <a href="{{ route('admin.category.edit', $item->id) }}" class="btn btn-primary btn-sm">sửa</a>
                    </td> 
                </tr> 
                @endforeach
                

            </tbody>
            
        </table>
        {{ $categories->links() }}
    </div>
</div>
@endsection

