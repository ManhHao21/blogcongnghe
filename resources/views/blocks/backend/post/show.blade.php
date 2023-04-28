
@extends('layouts.backend');
@section('head')
  
@endsection
@section('content')
@section('danhsach')
    Duyệt bài viết
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
                    <th style="width:20%">Tiêu đề</th>
                    <th>Hình ảnh</th>
                    <th>Danh mục</th>
                    <th>bài viết hay</th>
                    <th>bài viết mới</th>
                    <th>bài viết slide</th>
                    <th>Số bình luận</th>
                    @if (Auth::user()->is_admin == 1)
                    <th>Tình trạng</th>
                    @endif 
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{$post->iteration}}</td>
                    <td>{{$post->title}}</td>
                    <td>
                        @if($post->image)
                            <img src="{{ asset('image/post/' . $post->image) }}" width="50px" height="auto" alt="">
                        @endif
                    </td>
                    <td>{{$post->categories->name}}</td>
                    <td>
                        @if($post->highlight_post == 1)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked disabled>
                        </div>
                        @endif
                        </td>
                        <td>
                        @if($post->new_post == 1)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked disabled>
                            </div>
                        </div>
                        @endif
                    </td>
                    <td>
                        @if($post->slide_post == 1)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked disabled>
                            </div>
                        </div>
                        @endif
                    </td>
                    <td> {{ $post->comments->count() }} </td>
                    @if (Auth::user()->is_admin == 1)
                    <td>{!! $post->is_active == 0 ? '<button type="button" class="btn btn-danger btn-sm">Chưa được duyệt</button>' : '<button type="button" class="btn btn-primary btn-sm">Đã duyệt</button>' !!}</td>
                    @endif 
                    
                    <td>
                    <td>
                        <form method="POST" action="{{ route('admin.post.approve.ShowPost', $post->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Bạn có chắc chắn muốn duyệt liên hệ này?')">Duyệt bài viết</button>
                        </form>
                    </td> 
                </tr> 
                @endforeach
            </tbody>
        </table>
        <div class="single-post">
            <div class="post-meta"><span class="mx-1">&bullet;</span> <span>{{\Carbon\Carbon::parse($post->create_at)->format('d-m-Y')}}</span></div>
                <h1 class="mb-5">{{$post->title}}</h1>
                    <img src="{{$post->imageUrl()}}" alt="" class="img-fluid">
                <p style="width=1000px">{!!$post->content!!}</p>
            </div>
</div>
@endsection

