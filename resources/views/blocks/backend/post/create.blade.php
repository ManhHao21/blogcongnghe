
@extends('layouts.backend');
@section('head')
  
@endsection
@section('content')
<form action="{{route('admin.post.store')}}" method="post" enctype="multipart/form-data">
    @csrf
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
                @foreach($categories as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
      <div class="form-group">
        <label for="tilte">tilte</label>
        <input type="text" name="title" class="form-control" id="tilte" placeholder="Nhập tiêu đề" value="">
      </div>
      <div class="form-group">
        <label for="description">description</label>
        <input type="text" name="description" class="form-control" id="description" placeholder="Nhập description" value="">
      </div>

      <div class="form-group">
        <label for="new_post">New Post</label>
        <input type="checkbox" name="new_post" id="new_post" >
      </div>
      <div class="form-group">
        <label for="Highlight_Post">Highlight Post</label>
        <input type="checkbox" name="highlight_post" id="Highlight_Post"  >
      </div>
      <div class="form-group">
        <label for="Image">Image</label>
        <input type="file" name="image" class="form-control" id="Image" accept="image/*">
      </div>
      <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
      </div>
    </div>

      <button type="submit" class="btn btn-primary">Tạo danh mục</button>
  </form>
@endsection