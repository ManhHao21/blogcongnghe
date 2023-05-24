
@extends('layouts.backend');
@section('danhsach')
    Tạo bài viết
@endsection
@section('content')
<form action="{{route('admin.post.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    @if(count($errors))
      <div class="alert alert-danger ml-5 mt-5">
        @foreach($errors->all() as $err)
        {{$err}} <br>
        @endforeach
      </div>
    @endif
    <div class="card-body">
        <div class="form-group">
            <label>Danh mục</label>
            <select class="form-control" name = "id">
                @foreach($categories as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
      <div class="form-group">
        <label for="tilte">Tiêu đề</label>
        <input type="text" name="title" class="form-control" id="tilte" placeholder="Nhập tiêu đề" value="">
      </div>
      <div class="form-group">
        <label for="description">description</label>
        <input type="text" name="description" class="form-control" id="description" placeholder="Nhập description" value="">
      </div>

      <div class="form-group form-switch">
         <input class="form-check-input" name = "new_post" type="checkbox" id="flexSwitchCheckDefault" checked> 
         <label for="new_post">Bài viết mới</label>
        <br>
        <input class="form-check-input" type="checkbox" name="highlight_post" id="flexSwitchCheckDefault" checked>  
        <label for="Highlight_Post">Bài viết hot</label>
        <br>
        <input class="form-check-input" type="checkbox" name="slide_post" id="flexSwitchCheckDefault" checked>  
        <label for="slide_post">Slide</label>
      </div>
      <div class="form-group">
        <label for="Image">Hình ảnh</label>
        <input type="file" name="image" class="form-control" id="Image" accept="image/*">
      </div>
      <div class="form-group">
        <label for="content">Nội dung</label>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
      </div>
    </div>

      <button type="submit" class="btn btn-primary">Thêm mới bài viết</button>
      <button type="submit" class="btn btn-secondary"><a href="{{route('admin.post.index')}}" style="color: white; text-decoration: none;">Quay lại</a></button>
  </form>
@endsection

<style>
  span {
    font-weight: bold;
  }

  .form-group {
    margin-bottom: 30px;
  }
</style>