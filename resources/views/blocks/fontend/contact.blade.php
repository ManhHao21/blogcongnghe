@extends('layouts.client')
@section('menu')
    @include('blocks.fontend.menu')
@endsection 
@section('header')
<main id="main">
    <section id="contact" class="contact mb-5">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <h1 class="page-title">Liên hệ</h1>
          </div>
        </div>
        <div class="row gy-4">
          <div class="col-md-4">
            <div class="info-item">
              <i class="bi bi-geo-alt"></i>
              <h3>Địa chỉ: </h3>
              <address>182 đường Lê Duẩn - Thành phố vinh</address>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info-item info-item-borders">
              <i class="bi bi-phone"></i>
              <h3>Số điện thoại:</h3>
              <p><a href="">0989449675</a></p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info-item">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">phanhaost@gmail.com</a></p>
            </div>
          </div>
        </div>
        @if(session('msg'))
        <div class="alert alert-success  ml-5 mt-5" >
            {{session('msg')}}
        </div>
        @endif
          <form action="{{route('web.contact.send')}}" method="POST" role="form" class="form mt-5 php-email-form">
            @csrf
            @method('POST')
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Họ và tên" required>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Nhập email" required>
              </div>
              <div class="form-group col-md-6">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Nhập số phone" required>
              </div>
              <div class="form-group col-md-6">
                <input type="text" class="form-control" name="address" id="address" placeholder="Nhập địa chỉ" required>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" placeholder="Nội dung lien he" required></textarea>
            </div>
            <button type="submit">Gửi liên hệ</button>
          </form>
      </div>
    </section>
  </main>
  @section('footer')
    @include('blocks.fontend.footer')
@endsection
@endsection
