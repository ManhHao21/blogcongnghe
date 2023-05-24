
@extends('layouts.backend');
@section('head')
  
@endsection
@section('content')
@section('danhsach')
    Quản lí bài viết
@endsection
@section('title')
    Quản lí bài viết
@endsection
@if(session('msg'))
  <div class="alert alert-success  ml-5 mt-5" >
      {{session('msg')}}
  </div>
@endif
<div class="card mb-4">
    <div class="card-body">
      <button type="button" class="btn btn-block btn-primary mb-3"><a href="{{route('admin.post.create')}}" style="color: white; text-decoration: none;">Thêm bài viết</a></button>
      <table class="table table-striped table-bordered table-hover ">
        <thead>
          <tr>
            <th>STT</th>
            <th style="width:20%">Tiêu đề</th>
            <th style="width:5%">Hình ảnh</th>
            <th style="width:7%">Danh mục</th>
            <th style="width:7%">bài viết hot</th>
            <th style="width:7%">bài viết mới</th>
            <th>Slide</th>
            <th>Số bình luận</th>
            <th>Độc giả</th>
            @if (Auth::user()->is_admin == 1)
              <th>Hành động</th>
            @endif 
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach ($user as $key=> $item )
              @if ($item->is_active == 0 && Auth::user()->is_admin == 0 && $item->users_id == Auth::id())
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
                  <td> {{ $item->user->name }} </td>
                  @if (Auth::user()->is_admin == 0)
                    <td>{!! $item->is_active == 0 ? '<button type="button" class="btn btn-danger btn-sm">Chưa được duyệt</button>' : '<button type="button" class="btn btn-primary btn-sm">Đã duyệt</button>' !!}</td>
                  @endif 
                  <td><a href="{{ route('admin.post.edit', $item->id) }}" class="btn btn-primary btn-sm">Sửa</a></td>
                </tr>
              @endif
              @endforeach
              @foreach ($admin as $key=>$item)
                @if(Auth::user()->is_admin == 1)
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
                      <td> {{ $item->user->name }} </td>
                      @if (Auth::user()->is_admin == 1)
                      <td>{!! $item->is_active == 0 ? '<button type="button" class="btn btn-danger btn-sm">Chưa được duyệt</button>' : '<button type="button" class="btn btn-primary btn-sm">Đã duyệt</button>' !!}</td>
                      @endif 
                        <td>
                            <a href="{{route('admin.post.delete', $item->id)}}" class="btn btn-danger btn-sm hiden">Xóa</a>
                            <a href="{{ route('admin.post.edit', $item->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                        </td>
                </tr>
                @endif
              @endforeach
            </tbody>
        </table>
        @if(Auth::user()->is_admin == 1)
          {!! $admin->links() !!}
        @endif
        
        
    
</div>
@endsection

