



@extends('layouts.backend');
@section('head')
  
@endsection
@section('content')
      @if(session('msg'))
        <div class="alert alert-success">
            {{session('msg')}}
        </div>
      @endif
<form action="{{route('admin.post.update', $post->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    @if(count($errors))
    <div class="alert alert-danger">
      @foreach($errors->all() as $err)
      {{$err}} <br>
      @endforeach
  </div>
    @endif
    <div class="card-body">
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name = "category_id">
                @foreach($category as $item)
                <option value="{{$item->id}}" @if($post->categories_id == $item->id) selected @endif>{{$item->name}}</option>
                @endforeach
            </select>
        </div>
      <div class="form-group">
        <label for="tilte">tilte</label>
        <input type="text" name="title" class="form-control" id="tilte" placeholder="Nhập tiêu đề" value="{{$post->title}}">
      </div>
      <div class="form-group">
        <label for="description">description</label>
        <input type="text" name="description" class="form-control" id="description" placeholder="Nhập description" value="{{$post->description}}">
      </div>

      <div class="form-group">
        <label for="new_post">New Post</label>
        <input type="checkbox" name="new_post" id="new_post"  @if($post->new_post) checked @endif>
      </div>
      <div class="form-group">
        <label for="Highlight_Post">Highlight Post</label>
        <input type="checkbox" name="highlight_post" id="Highlight_Post"  @if($post->highlight_post) checked @endif >
      </div>
      <div class="form-group">
        <label for="Image">Image</label>
        <input type="file" name="image" class="form-control" id="Image" accept="image/*" value="{{$post->image}}">
      </div>
      <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" cols="30" rows="10" value = "{!! $post->content !!}"></textarea>
      </div>
    </div>

      <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
      <button type="submit" class="btn btn-primary"><a href="{{route('admin.post.index')}}" style="color: white; text-decoration: none;">Trở về</a></button>
  </form>
@endsection