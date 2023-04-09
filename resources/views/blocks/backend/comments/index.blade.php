
@extends('layouts.backend');
@section('head')
  
@endsection
@section('danhsach')
    Danh sách comment
@endsection
@section('title')
    Quản lí bình luận
@endsection
@section('content')
<div class="card mb-4">
   
</div>
<div class="card mb-4">
    <div class="card-body">
       
        @if(session('msg'))
        <div class="alert alert-success ">
            {{session('msg')}}
        </div>
        @endif
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>tên người dùng</th>
                    <th>email</th>
                    <th>nội dung</th>
                    {{-- <th>số bình luận</th> --}}
                    <th>bài viết</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
               @foreach ($comments as $key=>$item)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->content}}</td>
                    
                    <td>{{$item->post->title}}</td>
                    <td>
                        <a onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')" href="{{route('admin.comment.delete', $item->id)}}" class="btn btn-danger btn-sm">Xóa</a>
                     
                    </td> 
                </tr> 
                @endforeach
               
            </tbody>
        </table>
    </div>
</div>
@endsection