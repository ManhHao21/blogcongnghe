
@extends('layouts.backend');
@section('head')
  
@endsection
@section('danhsach')
    Danh sách liên hệ
@endsection
@section('content')
@section('title')
    Liên hệ
@endsection
<div class="card mb-4">
   
</div>
<div class="card mb-4">
    <div class="card-body">
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
                    <th>Địa chỉ</th>
                    <th>số điện thoại</th>
                    <th>nội dung</th>
                    <th>subject</th>
                    <th>Tình trạng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
               @foreach ($contacts as $key=>$item)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->subject}}</td>
                    <td>{{$item->message}}</td>
                    <td>{!! $item->is_contact == 0 ? '<button type="button" class="btn btn-danger">Chưa được duyệt</button>' : '<button type="button" class="btn btn-primary">Dã duyệt</button>' !!}</td>
                    <td>
                        <a onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')" href="{{route('admin.contact.delete', $item->id)}}" class="btn btn-danger btn-sm">Xóa</a>
                        <a href="{{route('admin.contact.show', $item->id)}}"  class="btn btn-secondary btn-sm" style="color: white; text-decoration: none;">Xem</a>
                    </td> 
                </tr> 
                @endforeach
               
            </tbody>
        </table>
        {!! $contacts->links() !!}
    </div>
</div>
@endsection