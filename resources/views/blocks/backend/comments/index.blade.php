
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
                    <th>Tình trạng</th>
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
                    <td>{!! $item->is_comment == 0 ? '<button type="button" class="btn btn-danger">Chưa được duyệt</button>' : '<button type="button" class="btn btn-primary">Đã được duyệt</button>' !!}</td>
                    <td>
                    <td>
                        <a  href="{{route('admin.comment.delete', $item->id)}}" class="btn btn-danger btn-sm">Xóa</a>
                        <a href="{{route('admin.comment.show', $item->id)}}"  class="btn btn-secondary btn-sm" style="color: white; text-decoration: none;">Xem</a>
                    </td> 
                </tr> 
                @endforeach
            </tbody>
        </table>
        {{ $comments->links() }}
    </div>
</div>
@endsection