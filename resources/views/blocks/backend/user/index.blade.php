
@extends('layouts.backend');
@section('head')
  
@endsection
@section('content')
<div class="card mb-4">
@section('danhsach')
    Danh sách người dùng
@endsection

@section('title')
    Trang người dùng
@endsection
</div>
<div class="card mb-4">
    <div class="card-body">
        <button type="button" class="btn btn-block btn-primary ml-3;"><a href="{{route('admin.user.create')}}" style="color: white; text-decoration: none;">Thêm người dùng</a></button>
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
                    <th>email</th>
                    <th>Is Admin</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
               @foreach ($user as $key=>$item)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->is_admin}}</td>
                  
                    <td>
                        <a onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')" href="{{route('admin.user.delete', $item->id)}}" class="btn btn-danger btn-sm">Xóa</a>
                       <a href="{{ route('admin.user.edit', $item->id) }}" class="btn btn-danger btn-sm">sửa</a>
                    </td> 
                </tr> 
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection