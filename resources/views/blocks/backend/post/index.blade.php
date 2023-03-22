
@extends('layouts.backend');
@section('head')
  
@endsection
@section('content')
<div class="card mb-4">
   
</div>
<div class="card mb-4">
    <div class="card-body">
        <button type="button" class="btn btn-block btn-primary ml-3;"><a href="{{route('admin.post.create')}}" style="color: white; text-decoration: none;">Thêm Danh Mục</a></button>
        @if(session('msg'))
        <div class="alert alert-success">
            {{session('msg')}}
        </div>
        @endif
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Highlight post</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
               @foreach ($posts as $key=>$item)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->title}}</td>
                    <td>
                        @if($item->image)
                            <img src="{{ asset('image/post/' . $item->image) }}" width="50px" height="auto" alt="">
                        @endif
                    </td>
                    <td>{{$item->categories->name}}</td>
                    <td>{{$item->highlight_post  == 1 ? "x" : ''}}</td>
                    <td>
                        <a onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')" href="{{route('admin.post.delete', $item->id)}}" class="btn btn-danger btn-sm">Xóa</a>
                       <a href="{{ route('admin.post.edit', $item->id) }}" class="btn btn-danger btn-sm">sửa</a>
                    </td> 
                </tr> 
                @endforeach
            </tbody>
        </table>
        {{-- {{$posts->links()}} --}}

        {{ $posts->onEachSide(5)->links() }}
    </div>
</div>
@endsection