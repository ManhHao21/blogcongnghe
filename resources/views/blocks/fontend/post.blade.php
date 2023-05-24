@extends('layouts.client')
@section('menu')
    @include('blocks.fontend.menu')
@endsection 
@section('header')
<main id="main">
    <section class="single-post-content">
      <div class="container">
        <div class="row">
          <div class="col-md-9 post-content" data-aos="fade-up">
            <div class="single-post">
              <div class="post-meta"><span class="mx-1">&bullet;</span>{{ $post->user->name }} - <span>{{\Carbon\Carbon::parse($post->create_at)->format('d-m-Y')}}</span></div>
              <h1 class="mb-5">{{$post->title}}</h1>
                <img src="{{$post->imageUrl()}}" alt="" class="img-fluid">
              <p style="width=1000px">{!!$post->content!!}</p>
            </div>
            <div class="post-position">
              <h5 class="comment-title">{{$post->comments()->count()}} bình luận</h5>
            </div>
            
            
          <div class="comments"> 
            @foreach ($post->comments as $item)
            @if($item->is_comment == 1 )
              <div class="comment d-flex mb-4">
                <div class="flex-shrink-0">
                  <div class="avatar avatar-sm rounded-circle">
                    <img class="avatar-img" src="{{asset('image/avatacomment.jpg')}}" alt="" class="img-fluid">
                  </div>
                </div>
                <div class="flex-grow-1 ms-2 ms-sm-3">
                  <div class="comment-meta d-flex align-items-baseline">
                    <h6 class="me-2">{{$item->name}}</h6>
                    <span class="text-muted">{{\Carbon\Carbon::parse($item->create_at)->format('H:i d-m-Y')}}</span>
                  </div>
                  <div class="comment-body">
                  {{$item->content}}
                </div>
              </div>
              @endif
            </div>
            
            @endforeach
            <a href="#" class="btn btn-primary btn-sm" onclick="showCommentForm(event)">Bình luận</a>
            <form class="row justify-content-center mt-5" id="comment-form" method="post" action="{{route('web.post.comment', $post->id)}}" style="display:none;">
              @csrf
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6 mb-3">
                    <label for="comment-name">Họ và tên:</label>
                    <input type="text" class="form-control" name="name" id="comment-name" placeholder="Nhập họ và tên......">
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label for="comment-email">Email</label>
                    <input type="text" class="form-control" name="email" id="comment-email" placeholder="Nhập email......">
                  </div>
                  <div class="col-12 mb-3">
                    <label for="comment-message">Nội dung</label>
                    <textarea class="form-control" id="comment-message" name="content" placeholder="Nhập nội dung" cols="30" rows="10"></textarea>
                  </div>
                  <div class="col-12">
                    <input type="submit" class="btn btn-primary" value="Bình luận">
                  </div>
                </div>
              </div>
            </form>
          </div>
          
      </div>
      <div class="col-md-3">
        <!-- ======= Sidebar ======= -->
        <div class="aside-block">

          <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              @php
                $string = $xml->channel->title;
                $parts = explode('-', $string);
                $trimmed = trim($parts[0]);
              @endphp
              <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="true">{{$trimmed }}</button>
            </li>
            <li class="nav-item" role="presentation">
              @php
                $string1 = $xml1->channel->title;
                $parts1 = explode('-', $string1);
                $trimmed1 = trim($parts1[0]);
              @endphp
              <button class="nav-link" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending" aria-selected="false">{{$trimmed1 }}</button>
            </li>
            <li class="nav-item" role="presentation">
              @php
                $string2 = $xml2->channel->title;
                $parts2 = explode('-', $string2);
                $trimmed2 = trim($parts2[0]);
              @endphp
              <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill" data-bs-target="#pills-latest" type="button" role="tab" aria-controls="pills-latest" aria-selected="false">{{$trimmed2 }}</button>
            </li>
          </ul>

          <div class="tab-content" id="pills-tabContent">

            <!-- Popular -->
            @php
              $items = $xml->xpath('//item');
              shuffle($items);
              $items = array_slice($items, 0, 6);
            @endphp
            <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
              @foreach ($items as $item)
              <div class="post-entry-1 border-bottom">
                <div class="post-meta">{{$item->pubDate}}</div>
                <h2 class="mb-2"><a href="{{$item->link}}" target="_blank">{{$item->title}}</a></h2>
                <span class=" mb-3 d-block" style="color:rgb(23, 22, 22)">{{$xml->channel->generator}}</span>
              </div>
              @endforeach
            </div> <!-- End Popular -->

            <!-- Trending -->
            @php
              $items = $xml1->xpath('//item');
              shuffle($items);
              $items = array_slice($items, 0, 6);
          @endphp
            <div class="tab-pane fade" id="pills-trending" role="tabpanel" aria-labelledby="pills-trending-tab">
              @foreach ($items as $item)
              <div class="post-entry-1 border-bottom">
                <div class="post-meta">{{$item->pubDate}}</div>
                <h2 class="mb-2"><a href="{{$item->link}}" target="_blank">{{$item->title}}</a></h2>
                <span class="author mb-3 d-block">{{$xml->channel->generator}}</span>
              </div>
              @endforeach
            </div> <!-- End Trending -->

            <!-- Latest -->
            @php
              $items = $xml2->xpath('//item');
              shuffle($items);
              $items = array_slice($items, 0, 6);
          @endphp
            <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
              @foreach ($items as $item)
              <div class="post-entry-1 border-bottom">
                <div class="post-meta">{{$item->pubDate}}</div>
                <h2 class="mb-2"><a href="{{$item->link}}" target="_blank">{{$item->title}}</a></h2>
                <span class="author mb-3 d-block">{{$xml->channel->generator}}</span>
              </div>
              @endforeach
            </div> 
          </div>
        </div>
        <div class="aside-block">
          <h3 class="aside-title">Tags</h3>
          <ul class="aside-tags list-unstyled">
            @foreach ( $categori as $item)
              <li><a href="route($item->name)">{{$item->name}}</a></li>
            @endforeach
          </ul>
        </div>
      </div> 
    </div>
  </section>
<</main>
@section('footer')
    @include('blocks.fontend.footer')
@endsection 
@endsection
            
<style>
  #comment-form {
    display: none;
  }

  p img {
    width: 100%;
  }
  .post-position {
    display: flex;
    justify-content: space-between;
    align-items: start;
  }
</style>
  <script>
  function showCommentForm(event) {
    event.preventDefault();
    var commentForm = document.getElementById("comment-form");
    commentForm.style.display = "block";
  }
  
//   document.getElementById("comment-form").addEventListener("submit", function(event) {
//   event.preventDefault();
//   var formData = new FormData(this);
//   fetch(this.action, {
//     method: this.method,
//     body: formData
//   })
//   .then(response => response.json())
//   .then(data => {
//     if (data.success) {
//       alert("Bình luận của bạn đã được gửi thành công.");
//       var commentsContainer = document.getElementById("comments-container");
//       var newComment = document.createElement("div");
//       newComment.innerHTML = "<strong>" + data.comment.name + ":</strong> " + data.comment.content;
//       commentsContainer.appendChild(newComment);
//       document.getElementById("comment-name").value = "";
//       document.getElementById("comment-email").value = "";
//       document.getElementById("comment-message").value = "";
//     } else {
//       alert("Đã xảy ra lỗi. Vui lòng thử lại sau.");
//     }
//   })
//   .catch(error => {
//     alert("Đã xảy ra lỗi. Vui lòng thử lại sau. Bình luận của bạn vẫn được lưu trữ trong cơ sở dữ liệu. Vui lòng tải lại trang để xem bình luận của bạn.");
//     console.error(error);
//   });
// });
</script>
            
