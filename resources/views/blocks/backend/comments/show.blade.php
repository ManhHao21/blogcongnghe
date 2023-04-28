
@extends('layouts.backend');
@section('head')
  
@endsection
@section('danhsach')
    Danh sách duyệt bình luận
@endsection
@section('content')
@section('title')
    Liên hệ
@endsection
{{-- <div class="card mb-4">
   
</div>
<div class="card mb-4">
    <div class="card-body">
        @if(session('msg'))
        <div class="alert alert-success">
            {{session('msg')}}
        </div>
        @endif
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>name</th>
                    <th>Địa chỉ</th>
                    <th>số điện thoại</th>
                    <th>nội dung</th>
                    <th>subject</th>
                    <th>Tình trạng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
               @foreach ($contacts as $key=>$item)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->subject}}</td>
                    <td>{{$item->message}}</td>
                    <td>{!! $item->is_contact == 0 ? '<button type="button" class="btn btn-danger">Chưa được duyệt</button>' : '<button type="button" class="btn btn-primary">Dã duyệt</button>' !!}</td>
                    <td>
                        <a onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')" href="{{route('admin.contact.delete', $item->id)}}" class="btn btn-danger btn-sm">Xóa</a>
                        <button type="submit" class="btn btn-secondary"><a href="{{route('admin.contact.show')}}" style="color: white; text-decoration: none;">Xem</a></button>
                    </td> 
                </tr> 
                @endforeach
               
            </tbody>
        </table>
        {!! $contacts->links() !!}
    </div>
</div> --}}

<!-- Bắt đầu table -->
<table class="table table-striped table-hover">
    <!-- Tiêu đề bảng -->
    <thead>
        <tr>
            <th>#</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Nội dung</th>
            <th>Bài viết</th>
            <th>Tình trạng</th>
            <th>Ngày bình luận</th>
            <th></th>
        </tr>
    </thead>
    <!-- Thân bảng -->
    <tbody>
        @foreach($comment as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->content }}</td>
                <td>{{$item->post ? $item->post->title : 'Không có bài đăng'}}</td>
                <td>{{ $item->is_comment }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    @if ($item->is_comment == 1)
                        <button type="button" class="btn btn-danger">Đã được duyệt</button>
                    @elseif($item->is_comment == 0)
                        <button type="button" class="btn btn-primary">Chưa được duyệt</button>
                    @endif
                </td>
                <td>
                    <form method="POST" action="{{ route('admin.comment.postShow', $item->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Bạn có chắc chắn muốn duyệt liên hệ này?')">Duyệt liên hệ</button>
                    </form>
                    
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<!-- Kết thúc table -->

@endsection