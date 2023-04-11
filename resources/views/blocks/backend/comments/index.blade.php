
@extends('layouts.backend');
@section('head')
  
@endsection
@section('danhsach')
    Danh sách bình luận
@endsection
@section('title')
    Quản lí bình luận
@endsection
@section('content')
<div class="card mb-4">
   
</div>
@if(session('msg'))
  <div class="alert alert-success  ml-5 mt-5" >
      {{session('msg')}}
  </div>
@endif
<div class="card mb-4">
    <div class="card-body">

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
                    
                    <td>{{$item->post ? $item->post->title : 'Không có bài đăng'}}</td>
                    <td>
                        <a  href="{{route('admin.comment.delete', $item->id)}}" class="btn btn-danger btn-sm">Xóa</a>
                     
                    </td> 
                </tr> 
                @endforeach
               
            </tbody>
        </table>
    </div>
</div>
@endsection