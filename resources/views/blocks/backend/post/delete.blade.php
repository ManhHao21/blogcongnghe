
@extends('layouts.backend');
@section('head')
  
@endsection
@section('content')
@section('danhsach')
    Xóa bài viết
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
                    <th>bài viết hay</th>
                    <th>bài viết mới</th>
                    <th>bài viết slide</th>
                    <th>Số bình luận</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$post->id}}</td>
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
                    <td class="d-flex justify-content-center w-70">
                        <form action="{{ route('admin.post.deletepost', $post->id) }}" method="POST">
                            @csrf
                            <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')" class="btn btn-danger btn-sm h-100">Xóa</button>
                        </form>
                        <button type="submit" class="btn btn-secondary btn-sm  h-100"><a href="{{route('admin.category.index')}}" style="color: white; text-decoration: none;">Trở về</a></button>
                    </td> 
                </tr> 
            </tbody>
        </table>
    </div>
</div>
@endsection