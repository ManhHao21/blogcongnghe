
@extends('layouts.backend');
@section('head')
@endsection
@section('content')
@section('danhsach')
    Danh sách bài viết
@endsection
@section('title')
    Trang bài viết
@endsection
<div class="card mb-4">
</div>
@if(session('msg'))
    <div class="alert alert-success  ml-5 mt-5" >
        {{session('msg')}}
    </div>
@endif
<div class="card mb-4">
    <div class="card-body">
        <table class="table table-striped table-bordered table-hover ">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tiêu đề</th>
                    <th>Hình ảnh</th>
                    <th>Danh mục</th>
                    <th>bài viết hot</th>
                    <th>bài viết mới</th>
                    <th>bài viết slide</th>
                    <th>Số bình luận</th>
                    @if (Auth::user()->is_admin == 1)
                    <th>Hành động</th>
                    @endif 
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $key=>$item)
                @if($item->is_active== 0)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->title}}</td>
                    <td>
                        @if($item->image)
                            <img src="{{ asset('image/post/' . $item->image) }}" width="50px" height="auto" alt="">
                        @endif
                    </td>
                    <td>{{$item->categories->name}}</td>
                    <td>
                        @if($item->highlight_post == 1)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked disabled>
                        </div>
                        @endif
                    </td>
                    <td>
                        @if($item->new_post == 1)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked disabled>
                            </div>
                        </div>
                        @endif
                    </td>
                    <td>
                        @if($item->slide_post == 1)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked disabled>
                            </div>
                        </div>
                        @endif
                    </td>
                    <td> {{ $item->comments->count() }} </td>
                    @if (Auth::user()->is_admin == 1)
                    <td>{!! $item->is_active == 0 ? '<button type="button" class="btn btn-danger btn-sm">Chưa được duyệt</button>' : '<button type="button" class="btn btn-primary btn-sm">Đã duyệt</button>' !!}</td>
                        @endif 
                    
                    <td>
                    <td>
                        @if (Auth::user()->is_admin == 0)
                        <a href="{{ route('admin.post.edit', $item->id) }}" class="btn btn-primary btn-sm">sửa</a>
                        @else
                        <a href="{{route('admin.post.delete', $item->id)}}" class="btn btn-danger btn-sm hiden">Xóa</a>
                        <a href="{{ route('admin.post.edit', $item->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                        <a href="{{ route('admin.post.approve.show', $item->id) }}" class="btn btn-primary btn-sm">Xem</a>
                        @endif
                    </td> 
                </tr> 
                @endif
                @endforeach
            </tbody>
        </table>
        {{$posts->links()}}

        {{ $posts->onEachSide(5)->links() }}
    </div>
</div>
@endsection

