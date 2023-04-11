
@extends('layouts.backend');
@section('head')
  
@endsection
@section('danhsach')
    Xóa bình luận
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
                <tr>
                    <td>{{$comments->id}}</td>
                    <td>{{$comments->name}}</td>
                    <td>{{$comments->email}}</td>
                    <td>{{$comments->content}}</td>
                    
                    <td>{{$comments->post ? $comments->post->title : 'Không có bài đăng'}}</td>
                    <td>
                        <form action="{{ route('admin.comment.deletepost', $comments->id) }}" method="POST">
                            @csrf
                            <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td> 
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection