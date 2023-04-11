{{-- @extends('layouts.client')
@section('menu')
    @include('blocks.fontend.menu')
@endsection 
@section('header')
<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">{{$category->name}}</div>
                </div>
                @foreach ($posts as $item)
                <div class="row pb-4">
                    <div class="col-md-5">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="{{$item->imageUrl()}}" alt=""/></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-7 animate-box">
                        <a href="'{{route('post', $item->slug)}}'" class="fh5co_magna py-2"> {{$item->title}} </a> <a href="#" class="fh5co_mini_time py-3"> &nbsp;&nbsp;{{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}} </a>
                        <div class="fh5co_consectetur"> {{$item->description}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                </div>
                <div class="clearfix"></div>
                <div class="fh5co_tags_all">
                @foreach ($categori as $item)
                    <a href="{{route('category', $item->slug)}}" class="fh5co_tagg">{{$item->name}}</a>
                @endforeach
                </div>
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">New</div>
                </div>
                @foreach ($new as $item)
                     <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="{{$item->imageUrl()}}" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font">{{$item->title}}</div>
                        <div class="most_fh5co_treding_font_123">{{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}} </div>
                    </div>
                </div>
                @endforeach
               
              
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-12 text-center pb-4 pt-4">
                <a href="#" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>
                <a href="#" class="btn_pagging">1</a>
                <a href="#" class="btn_pagging">2</a>
                <a href="#" class="btn_pagging">3</a>
                <a href="#" class="btn_pagging">...</a>
                <a href="#" class="btn_mange_pagging">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>
             </div>
        </div>
    </div>
</div>
<div class="container-fluid pb-4 pt-5">
    <div class="container animate-box">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">tin hot</div>
        </div>
        <div class="owl-carousel owl-theme" id="slider2">
            @foreach ($hightlight as $item)
            <div class="item px-2">
                <div class="fh5co_hover_news_img">
                    <div class="fh5co_news_img"><img src="{{$item->imageUrl()}}" alt=""/></div>
                    <div>
                        <a href="#" class="d-block fh5co_small_post_heading"><span class="">{{$item->title}}</span></a>
                        <div class="c_g"><i class="fa fa-clock-o">{{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}}</i> </div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('blocks.fontend.footer')
@endsection --}}


@extends('layouts.client')
@section('menu')
    @include('blocks.fontend.menu')
@endsection 
@section('header')
<main id="main">
    <section>
      <div class="container">
        <div class="row">

          <div class="col-md-9" data-aos="fade-up">
            <h3 class="category-title">{{$category->name}}</h3>
            @foreach ($posts as $item)
            <div class="d-md-flex post-entry-2 half">
              <a href="{{route('post', $item->slug)}}" class="me-4 thumbnail">
                <img src="{{$item->imageUrl()}}" alt="" class="img-fluid">
              </a>
              <div>
                <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>{{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}}</span></div>
                <h3><a href="{{route('post', $item->slug)}}">{{$item->title}}</a></h3>
                <p>{{$item->description}}</p>
              </div>
            </div>
            @endforeach
          
          </div>

          <div class="col-md-3">
            <!-- ======= Sidebar ======= -->
            <div class="aside-block">

              <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Popular</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending" aria-selected="false">Trending</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill" data-bs-target="#pills-latest" type="button" role="tab" aria-controls="pills-latest" aria-selected="false">Latest</button>
                </li>
              </ul>

              <div class="tab-content" id="pills-tabContent">

                <!-- Popular -->
                <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                  <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Sport</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="#">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                  </div>

                  <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="#">17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                  </div>

                  <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="#">9 Half-up/half-down Hairstyles for Long and Medium Hair</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                  </div>

                  <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="#">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                  </div>

                  <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="#">The Best Homemade Masks for Face (keep the Pimples Away)</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                  </div>

                  <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="#">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                  </div>
                </div> <!-- End Popular -->

                <!-- Trending -->
                <div class="tab-pane fade" id="pills-trending" role="tabpanel" aria-labelledby="pills-trending-tab">
                  <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="#">17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                  </div>

                  <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="#">9 Half-up/half-down Hairstyles for Long and Medium Hair</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                  </div>

                  <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="#">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                  </div>

                  <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Sport</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="#">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                  </div>
                  <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="#">The Best Homemade Masks for Face (keep the Pimples Away)</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                  </div>

                  <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="#">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                  </div>
                </div> <!-- End Trending -->

                <!-- Latest -->
                <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
                  <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="#">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                  </div>

                  <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="#">The Best Homemade Masks for Face (keep the Pimples Away)</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                  </div>

                  <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="#">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                  </div>

                  <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Sport</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="#">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                  </div>

                  <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="#">17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                  </div>

                  <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="#">9 Half-up/half-down Hairstyles for Long and Medium Hair</a></h2>
                    <span class="author mb-3 d-block">Jenny Wilson</span>
                  </div>

                </div> <!-- End Latest -->

              </div>
            </div>

            <div class="aside-block">
              <h3 class="aside-title">Video</h3>
              <div class="video-post">
                <a href="https://www.youtube.com/watch?v=AiFfDjmd0jU" class="glightbox link-video">
                  <span class="bi-play-fill"></span>
                  <img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid">
                </a>
              </div>
            </div><!-- End Video -->

            <div class="aside-block">
              <h3 class="aside-title">Categories</h3>
              <ul class="aside-links list-unstyled">
                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Business</a></li>
                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Culture</a></li>
                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Sport</a></li>
                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Food</a></li>
                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Politics</a></li>
                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Celebrity</a></li>
                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Startups</a></li>
                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Travel</a></li>
              </ul>
            </div><!-- End Categories -->

            <div class="aside-block">
              <h3 class="aside-title">Tags</h3>
              <ul class="aside-tags list-unstyled">
                <li><a href="category.html">Business</a></li>
                <li><a href="category.html">Culture</a></li>
                <li><a href="category.html">Sport</a></li>
                <li><a href="category.html">Food</a></li>
                <li><a href="category.html">Politics</a></li>
                <li><a href="category.html">Celebrity</a></li>
                <li><a href="category.html">Startups</a></li>
                <li><a href="category.html">Travel</a></li>
              </ul>
            </div><!-- End Tags -->

          </div>

        </div>
      </div>
    </section>
  </main>
@endsection

@section('footer')
    @include('blocks.fontend.footer')
@endsection