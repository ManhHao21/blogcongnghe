
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
                    <th width = '5%'>STT</th>
                    <th>name</th>
                    <th>email</th>
                    <th>Địa chỉ</th>
                    <th>So dien thoai</th>
                    <th>giới tính</th>
                    <th >Is Admin</th>
                    <th width = '15%'></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $key=>$item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->address}}</td>
                        
                        <td>{{$item->sdt}}</td>
                        <td>{{$item->sex == 1 ? 'Nam' : 'Nữ'}}</td>
                        <td> 
                            @if($item->is_admin == 1)
                                <button type="button" class="btn btn-danger btn-sm">admin</button>
                            @elseif ($item->is_admin == 0) 
                                <button type="button" class="btn btn-primary btn-sm">Tác giả</button>
                            @endif
                        </td>
                        <td>
                            {{-- {{route('admin.user.delete', $item->id)}} --}}
                            {{-- onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')" --}}
                            <a  href="{{route('admin.user.delete', $item->id)}}" class="btn btn-danger btn-sm">Xóa</a>
                        <a href="{{ route('admin.user.edit', $item->id) }}" class="btn btn-primary btn-sm">sửa</a>
                        </td> 
                    </tr> 
                @endforeach
            </tbody>
        </table>
        {{$user->links()}}
    </div>
</div>

@endsection