
@extends('layouts.backend');
@section('head')
  
@endsection
@section('content')
<div class="card mb-4">
@section('danhsach')
    Xóa người dùng
@endsection

@section('title')
    Trang người dùng
@endsection
</div>
@if(session('msg'))
        <div class="alert alert-success">
            {{session('msg')}}
        </div>
        @endif
<div class="card mb-4">
    <div class="card-body">
        <button type="button" class="btn btn-block btn-primary "><a href="{{route('admin.user.create')}}" style="color: white; text-decoration: none;">Thêm người dùng</a></button>
        
        <table class="table table-striped table-bordered table-hover mt-3">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>Địa chỉ</th>
                    <th>So dien thoai</th>
                    <th>giới tính</th>
                    <th  >Is Admin</th>
                    <th  width = '15%'></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->address}}</td>
                    
                    <td>{{$user->sdt}}</td>
                    <td>{{$user->sex == 1 ? 'Nam' : 'Nữ'}}</td>
                    <td> 
                        @if($user->is_admin == 1)
                            <button type="button" class="btn btn-danger btn-sm">Admin</button>
                        @elseif ($user->is_admin == 0) 
                            <button type="button" class="btn btn-primary btn-sm">Nhân viên</button>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('admin.user.delete.post', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                        <button type="submit" class="btn btn-secondary btn-sm"><a href="{{route('admin.category.index')}}" style="color: white; text-decoration: none;">Trở về</a></button>
                    </td> 
                </tr> 
            </tbody>
        </table>

    </div>
</div>
@endsection