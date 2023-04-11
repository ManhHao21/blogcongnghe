
@extends('layouts.backend');
@section('head')
  
@endsection
@section('danhsach')
    Xóa liên hệ
@endsection
@section('content')
@section('title')
    Liên hệ
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
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>name</th>
                    <th>Địa chỉ</th>
                    <th>số điện thoại</th>
                    <th>nội dung</th>
                    <th>subject</th>
                    <th>Tình trạng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
               
                <tr>
                    <td>{{$Contacts->id}}</td>
                    <td>{{$Contacts->name}}</td>
                    <td>{{$Contacts->address}}</td>
                    <td>{{$Contacts->phone}}</td>
                    <td>{{$Contacts->subject}}</td>
                    <td>{{$Contacts->message}}</td>
                    <td>{!! $Contacts->is_contact == 0 ? '<button type="button" class="btn btn-danger">Chưa được duyệt</button>' : '<button type="button" class="btn btn-primary">Đã duyệt</button>' !!}</td>
                    <td>
                        <form action="{{ route('admin.contact.deletepost', $Contacts->id) }}" method="POST">
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