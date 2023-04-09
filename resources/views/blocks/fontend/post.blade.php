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

            <!-- ======= Single Post Content ======= -->
            <div class="single-post">
              <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>{{\Carbon\Carbon::parse($post->create_at)->format('d-m-Y')}}</span></div>
              <h1 class="mb-5">{{$post->title}}</h1>
                <img src="{{$post->imageUrl()}}" alt="" class="img-fluid">
              <p style="width=1000px">{!!$post->content!!}</p>
            </div>
            <h5 class="comment-title py-4">{{$post->comments()->count()}} bình luận</h5>
           <div class="comments"> 
            @foreach ($post->comments as $item)
              <div class="comment d-flex mb-4">
                <div class="flex-shrink-0">
                  <div class="avatar avatar-sm rounded-circle">
                    <img class="avatar-img" src="{{asset('image/avatacomment.jpg')}}" alt="" class="img-fluid">
                  </div>
                </div>
                <div class="flex-grow-1 ms-2 ms-sm-3">
                  <div class="comment-meta d-flex align-items-baseline">
                    <h6 class="me-2">{{$item->name}}</h6>
                    <span class="text-muted">{{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}}</span>
                  </div>
                  <div class="comment-body">
                   {{$item->content}}
                </div>
              </div>
            </div>
            @endforeach
            <a href="#" class="btn btn-primary btn-sm" onclick="showCommentForm()">Bình luận</a>

            <form class="row justify-content-center mt-5" id="comment-form" method="post" action="{{route('web.post.comment', $post->id)}}">
              @csrf
              <div class="col-lg-12">
                

                <div class="row">
                  <div class="col-lg-6 mb-3">
                    <label for="comment-name">Name</label>
                    <input type="text" class="form-control" name="name" id="comment-name" placeholder="Enter your name">
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label for="comment-email">Email</label>
                    <input type="text" class="form-control" name="email" id="comment-email" placeholder="Enter your email">
                  </div>
                  <div class="col-12 mb-3">
                    <label for="comment-message">Message</label>
                    <textarea class="form-control" id="comment-message" name="content" placeholder="Enter your name" cols="30" rows="10"></textarea>
                  </div>
                  <div class="col-12">
                    <input type="submit" class="btn btn-primary" value="Bình luận">
                  </div>
                </div>
              </div>
            </form>

            <div id="comments-container">
              <!-- existing comments go here -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection

@section('footer')
    @include('blocks.fontend.footer')
@endsection

<style>
  #comment-form {
    display: none;
}

  p img {
    width: 100%;
  }
</style>
<script>
 function showCommentForm() {
    var commentForm = document.getElementById("comment-form");
    commentForm.style.display = "block";
}
document.getElementById("comment-form").addEventListener("submit", function(event) {
  var content = document.getElementById("comment-message").value;
  if (!content.trim()) {
    event.preventDefault();
    alert("Please enter your comment.");
  }
});

document.querySelector('#comment-form').addEventListener('submit', function(e) {
    e.preventDefault(); // prevent default form submission

    // get form data
    const formData = new FormData(e.target);

    // send AJAX request
    fetch('/submit-comment', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json()) // parse response as JSON
    .then(data => {
      // update comments container with new comment
      const commentsContainer = document.querySelector('#comments-container');
      const newComment = document.createElement('div');
      newComment.innerHTML = data.commentHtml;
      commentsContainer.appendChild(newComment);

      // clear form fields
      e.target.reset();
    })
    .catch(error => {
      console.error(error);
    });
  });
</script>