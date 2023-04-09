
@extends('layouts.backend');
@section('danhsach')
    Chỉnh sửa bài viết
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
    <div class="alert alert-danger  ml-5 mt-5">
      @foreach($errors->all() as $err)
      {{$err}} <br>
      @endforeach
  </div>
    @endif
    <div class="card-body">
      <div class="form-group">
        <label>Category Parent</label>
        <select class="form-control mb-3" name="id">
          <option value="">Parent</option>
          @foreach ($category as $item)
          <option value="{{ $item->id }}" {{ $post->categories->id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
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
      <div class="form-group form-switch">
        <input class="form-check-input" name = "new_post" type="checkbox" id="flexSwitchCheckDefault"  @if($post->new_post) checked @endif> 
        <label for="new_post">Bài viết mới</label>
       <br>
       <input class="form-check-input" type="checkbox" name="highlight_post" id="flexSwitchCheckDefault"  @if($post->highlight_post) checked @endif>  
       <label for="Highlight_Post">Bài viết hay</label>

       <br>
       <input class="form-check-input" type="checkbox" name="slide_post" id="flexSwitchCheckDefault"  @if($post->slide_post) checked @endif>  
       <label for="slide_post">Bài viết hay</label>
     </div>
      
      <div class="form-group">
        <label for="Image">Image</label>
        <input type="file" name="image" class="form-control" id="Image" accept="image/*" value="{{$post->image}}">
      </div>
      <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" cols="30" rows="10" value = "{!!$post->content!!}"></textarea>
      </div>
    </div>

      <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
      <button type="submit" class="btn btn-secondary"><a href="{{route('admin.category.index')}}" style="color: white; text-decoration: none;">Trở về</a></button>
  </form>
@endsection