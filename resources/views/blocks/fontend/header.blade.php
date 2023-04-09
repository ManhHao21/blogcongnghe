<!-- <div class="container-fluid paddding mb-5">
    <div class="row mx-0">
     {{-- @foreach ($hightlight as $key=>$item)
        @if ($key == 0) --}}
        <div class="col-md-6 col-12 paddding" data-animate-effect="fadeIn">
            {{-- <a href="{{route('post', $item->slug)}}">
                <div class="fh5co_suceefh5co_height"><img src="{{$item->imageUrl()}}" alt="img"/> --}}
                    <div class="fh5co_suceefh5co_height_position_absolute"></div>
                    <div class="fh5co_suceefh5co_height_position_absolute_font">
                        {{-- <div class=""><a href="{{route('post', $item->slug)}}" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}} --}}
                        </a></div>
                        {{-- <div class=""><a href="{{route('post', $item->slug)}}" class="fh5co_good_font">{{$item->title}}</a></div> --}}
                    </div>
                </div>
            </a>
        </div>
        {{-- @endif
    @endforeach --}}
        <div class="col-md-6">
            <div class="row">
                {{-- @foreach ($hightlight as $key=>$item)
                    @if($key !=0) --}}
                            <div class="col-md-6 col-6 paddding" data-animate-effect="fadeIn">
                                
                                <div class="fh5co_suceefh5co_height_2">
                                    {{-- <a href="{{route('post', $item->slug)}}" class="fh5co_suceefh5co_height">
                                        <img src="{{$item->imageUrl()}}" alt="img"/>
                                        <div class="fh5co_suceefh5co_height_position_absolute"></div>
                                        <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                            <div class="">
                                                <a href="{{route('post', $item->slug)}}" class="color_fff"> 
                                                 <i class="fa fa-clock-o"></i>{{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}}</a>
                                            </div>
                                            <div class=""><a href="{{route('post', $item->slug)}}" class="fh5co_good_font_2"> {{$item->description}} </a></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                    @endif
                @endforeach 
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-3">
    <div class="container" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">New</div>
        </div>dd($item)
        <div class="owl-carousel owl-theme" id="slider1">
            @foreach($new as $item)
            
            <div class="item px-2">
                <div class="fh5co_latest_trading_img_position_relative">
                    <a href="{{route('post', $item->slug)}}" class="fh5co_suceefh5co_height">
                        <div class="fh5co_latest_trading_img "><img width="50px" height="50px" class="align-self-center" src="{{$item->imageUrl()}}" alt="img"/></div>
                        <div class="fh5co_latest_trading_img_position_absolute"></div>
                        <div class="fh5co_latest_trading_img_position_absolute_1">
                            <a href="{{route('post', $item->slug)}}" class="text-white">{{$item->description}} </a>
                            <div class="fh5co_latest_trading_date_and_name_color">{{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}} </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
                </div>
                @foreach ($category as $item)
                <div class="row pb-4">
                    <div class="col-md-5">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><a href="{{route('post', $item->slug)}}"><img src="{{$item->imageUrl()}}" alt=""/></a></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <a href="{{route('post', $item->slug)}}" class="fh5co_magna py-2">{{$item->title}}</a> <a href="{{route('post', $item->slug)}}" class="fh5co_mini_time py-3"> {{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}} </a>
                        <div class="fh5co_consectetur">{{$item->description}}
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
            <div class="col-md-3" data-animate-effect="fadeInRight">
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
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                </div>
                @foreach ($newhightlight as $item)
                    <div class="row pb-3">
                        <div class="col-5 align-self-center">
                            <a href="{{route('category',$item->slug )}}"><img src="{{$item->imageUrl()}}" alt="img" class="fh5co_most_trading"/></a>
                        </div>
                        <div class="col-7 paddding">
                            <div class="most_fh5co_treding_font weight" ><a href="{{route('post',$item->slug )}}">{{ $item->title}}</a></div>
                            <br>
                            <div class="most_fh5co_treding_font_123">
                                <a href="{{route('post',$item->slug )}}">{{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}}</a> 
                            </div>
                        </div>
                    </div>
                @endforeach --}}
                
                
            </div>
        </div>
        <div class="row mx-0" data-animate-effect="fadeInUp">
            <div class="col-12 text-center pb-4 pt-4">
                {{ $category->onEachSide(5)->links() }}
             </div>
        </div>
    </div>
</div> -->


<main id="main">

<!-- ======= Hero Slider Section ======= -->
<section id="hero-slider" class="hero-slider">
  <div class="container-md" data-aos="fade-in">
    <div class="row">
      <div class="col-12">
        <div class="swiper sliderFeaturedPosts">
          <div class="swiper-wrapper">
            @foreach ($banner as $item)
            <div class="swiper-slide">
              <a href="{{route('post', $item->slug)}}" class="img-bg d-flex align-items-end" style="background-image: url('{{$item->imageUrl()}}');">
                <div class="img-bg-inner">
                  <h2>{{$item->title}}</h2>
                  <p>{{$item->description}}</p>
                </div>
              </a>
            </div>
            @endforeach
          </div>
          <div class="custom-swiper-button-next">
            <span class="bi-chevron-right"></span>
          </div>
          <div class="custom-swiper-button-prev">
            <span class="bi-chevron-left"></span>
          </div>

          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Hero Slider Section -->

<!-- ======= Post Grid Section ======= -->
<section id="posts" class="posts">
  <div class="container" data-aos="fade-up">
    <div class="row g-5">
      <div class="col-lg-4">
        @foreach ($hightlight as $item)
            <div class="post-entry-1 lg">
          <a href="{{route('post', $item->slug)}}"><img src="{{$item->imageUrl()}}" alt="" class="img-fluid"></a>
          <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>{{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}}</span></div>
          <h2><a href="{{route('post', $item->slug)}}">{{$item->title}}</a></h2>
          <p class="mb-4 d-block">{{$item->description}}</p>
        </div>
        @endforeach
        

      </div>

      <div class="col-lg-8">
        <div class="row g-5">
          <div class="col-lg-4 border-start custom-border">
            @foreach ($newhightlight as $item)
            <div class="post-entry-1">
              <a href="{{route('post', $item->slug)}}"><img src="{{$item->imageUrl()}}" alt="" class="img-fluid"></a>
              <div class="post-meta"><span class="date">Sport</span> <span class="mx-1">&bullet;</span> <span>{{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}}</span></div>
              <h2><a href="{{route('post', $item->slug)}}">{{$item->title}}</a></h2>
            </div>
            @endforeach

          </div>
          <div class="col-lg-4 border-start custom-border">
            @foreach ($newPost as $item)
            <div class="post-entry-1">
              <a href="{{route('post', $item->slug)}}"><img src="{{$item->imageUrl()}}" alt="" class="img-fluid"></a>
              <div class="post-meta"><span class="date">Sport</span> <span class="mx-1">&bullet;</span> <span>{{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}}</span></div>
              <h2><a href="{{route('post', $item->slug)}}">{{$item->title}}</a></h2>
            </div>
            @endforeach
          </div>

          <!-- Trending Section -->
          <div class="col-lg-4">

            <div class="trending">
              <h3>Trending</h3>
              <ul class="trending-post">
                <li>
                  <a href="single-post.html">
                    <span class="number">1</span>
                    <h3>The Best Homemade Masks for Face (keep the Pimples Away)</h3>
                    <span class="author">Jane Cooper</span>
                  </a>
                </li>
                <li>
                  <a href="single-post.html">
                    <span class="number">2</span>
                    <h3>17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</h3>
                    <span class="author">Wade Warren</span>
                  </a>
                </li>
                <li>
                  <a href="single-post.html">
                    <span class="number">3</span>
                    <h3>13 Amazing Poems from Shel Silverstein with Valuable Life Lessons</h3>
                    <span class="author">Esther Howard</span>
                  </a>
                </li>
                <li>
                  <a href="single-post.html">
                    <span class="number">4</span>
                    <h3>9 Half-up/half-down Hairstyles for Long and Medium Hair</h3>
                    <span class="author">Cameron Williamson</span>
                  </a>
                </li>
                <li>
                  <a href="single-post.html">
                    <span class="number">5</span>
                    <h3>Life Insurance And Pregnancy: A Working Mom’s Guide</h3>
                    <span class="author">Jenny Wilson</span>
                  </a>
                </li>
              </ul>
            </div>

          </div> <!-- End Trending Section -->
        </div>
      </div>

    </div> <!-- End .row -->
  </div>
</section> <!-- End Post Grid Section -->

<!-- ======= Culture Category Section ======= -->
<section class="category-section">
  <div class="container" data-aos="fade-up">

    <div class="section-header d-flex justify-content-between align-items-center mb-5">
      <h2>Culture</h2>
      <div><a href="category.html" class="more">See All Culture</a></div>
    </div>

    <div class="row">
      <div class="col-md-9">

        <div class="d-lg-flex post-entry-2">
          <a href="single-post.html" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
            <img src="assets/img/post-landscape-6.jpg" alt="" class="img-fluid">
          </a>
          <div>
            <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
            <h3><a href="single-post.html">What is the son of Football Coach John Gruden, Deuce Gruden doing Now?</a></h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio placeat exercitationem magni voluptates dolore. Tenetur fugiat voluptates quas, nobis error deserunt aliquam temporibus sapiente, laudantium dolorum itaque libero eos deleniti?</p>
            <div class="d-flex align-items-center author">
              <div class="photo"><img src="assets/img/person-2.jpg" alt="" class="img-fluid"></div>
              <div class="name">
                <h3 class="m-0 p-0">Wade Warren</h3>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4">
            <div class="post-entry-1 border-bottom">
              <a href="single-post.html"><img src="assets/img/post-landscape-1.jpg" alt="" class="img-fluid"></a>
              <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
              <h2 class="mb-2"><a href="single-post.html">11 Work From Home Part-Time Jobs You Can Do Now</a></h2>
              <span class="author mb-3 d-block">Jenny Wilson</span>
              <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae, inventore pariatur numquam cumque possimus</p>
            </div>

            <div class="post-entry-1">
              <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
              <h2 class="mb-2"><a href="single-post.html">5 Great Startup Tips for Female Founders</a></h2>
              <span class="author mb-3 d-block">Jenny Wilson</span>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="post-entry-1">
              <a href="single-post.html"><img src="assets/img/post-landscape-2.jpg" alt="" class="img-fluid"></a>
              <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
              <h2 class="mb-2"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
              <span class="author mb-3 d-block">Jenny Wilson</span>
              <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae, inventore pariatur numquam cumque possimus</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="post-entry-1 border-bottom">
          <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
          <h2 class="mb-2"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
          <span class="author mb-3 d-block">Jenny Wilson</span>
        </div>

        <div class="post-entry-1 border-bottom">
          <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
          <h2 class="mb-2"><a href="single-post.html">17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</a></h2>
          <span class="author mb-3 d-block">Jenny Wilson</span>
        </div>

        <div class="post-entry-1 border-bottom">
          <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
          <h2 class="mb-2"><a href="single-post.html">9 Half-up/half-down Hairstyles for Long and Medium Hair</a></h2>
          <span class="author mb-3 d-block">Jenny Wilson</span>
        </div>

        <div class="post-entry-1 border-bottom">
          <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
          <h2 class="mb-2"><a href="single-post.html">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
          <span class="author mb-3 d-block">Jenny Wilson</span>
        </div>

        <div class="post-entry-1 border-bottom">
          <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
          <h2 class="mb-2"><a href="single-post.html">The Best Homemade Masks for Face (keep the Pimples Away)</a></h2>
          <span class="author mb-3 d-block">Jenny Wilson</span>
        </div>

        <div class="post-entry-1 border-bottom">
          <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
          <h2 class="mb-2"><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
          <span class="author mb-3 d-block">Jenny Wilson</span>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Culture Category Section -->

<!-- ======= Business Category Section ======= -->
<section class="category-section">
  <div class="container" data-aos="fade-up">

    <div class="section-header d-flex justify-content-between align-items-center mb-5">
      <h2>Business</h2>
      <div><a href="category.html" class="more">See All Business</a></div>
    </div>

    <div class="row">
      <div class="col-md-9 order-md-2">

        <div class="d-lg-flex post-entry-2">
          <a href="single-post.html" class="me-4 thumbnail d-inline-block mb-4 mb-lg-0">
            <img src="assets/img/post-landscape-3.jpg" alt="" class="img-fluid">
          </a>
          <div>
            <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
            <h3><a href="single-post.html">What is the son of Football Coach John Gruden, Deuce Gruden doing Now?</a></h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio placeat exercitationem magni voluptates dolore. Tenetur fugiat voluptates quas, nobis error deserunt aliquam temporibus sapiente, laudantium dolorum itaque libero eos deleniti?</p>
            <div class="d-flex align-items-center author">
              <div class="photo"><img src="assets/img/person-4.jpg" alt="" class="img-fluid"></div>
              <div class="name">
                <h3 class="m-0 p-0">Wade Warren</h3>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4">
            <div class="post-entry-1 border-bottom">
              <a href="single-post.html"><img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid"></a>
              <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
              <h2 class="mb-2"><a href="single-post.html">11 Work From Home Part-Time Jobs You Can Do Now</a></h2>
              <span class="author mb-3 d-block">Jenny Wilson</span>
              <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae, inventore pariatur numquam cumque possimus</p>
            </div>

            <div class="post-entry-1">
              <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
              <h2 class="mb-2"><a href="single-post.html">5 Great Startup Tips for Female Founders</a></h2>
              <span class="author mb-3 d-block">Jenny Wilson</span>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="post-entry-1">
              <a href="single-post.html"><img src="assets/img/post-landscape-7.jpg" alt="" class="img-fluid"></a>
              <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
              <h2 class="mb-2"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
              <span class="author mb-3 d-block">Jenny Wilson</span>
              <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae, inventore pariatur numquam cumque possimus</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="post-entry-1 border-bottom">
          <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
          <h2 class="mb-2"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
          <span class="author mb-3 d-block">Jenny Wilson</span>
        </div>

        <div class="post-entry-1 border-bottom">
          <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
          <h2 class="mb-2"><a href="single-post.html">17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</a></h2>
          <span class="author mb-3 d-block">Jenny Wilson</span>
        </div>

        <div class="post-entry-1 border-bottom">
          <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
          <h2 class="mb-2"><a href="single-post.html">9 Half-up/half-down Hairstyles for Long and Medium Hair</a></h2>
          <span class="author mb-3 d-block">Jenny Wilson</span>
        </div>

        <div class="post-entry-1 border-bottom">
          <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
          <h2 class="mb-2"><a href="single-post.html">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
          <span class="author mb-3 d-block">Jenny Wilson</span>
        </div>

        <div class="post-entry-1 border-bottom">
          <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
          <h2 class="mb-2"><a href="single-post.html">The Best Homemade Masks for Face (keep the Pimples Away)</a></h2>
          <span class="author mb-3 d-block">Jenny Wilson</span>
        </div>

        <div class="post-entry-1 border-bottom">
          <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
          <h2 class="mb-2"><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
          <span class="author mb-3 d-block">Jenny Wilson</span>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Business Category Section -->

<!-- ======= Lifestyle Category Section ======= -->
<section class="category-section">
  <div class="container" data-aos="fade-up">

    <div class="section-header d-flex justify-content-between align-items-center mb-5">
      <h2>Lifestyle</h2>
      <div><a href="category.html" class="more">See All Lifestyle</a></div>
    </div>

    <div class="row g-5">
      <div class="col-lg-4">
        <div class="post-entry-1 lg">
          <a href="single-post.html"><img src="assets/img/post-landscape-8.jpg" alt="" class="img-fluid"></a>
          <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
          <h2><a href="single-post.html">11 Work From Home Part-Time Jobs You Can Do Now</a></h2>
          <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae, inventore pariatur numquam cumque possimus exercitationem? Nihil tempore odit ab minus eveniet praesentium, similique blanditiis molestiae ut saepe perspiciatis officia nemo, eos quae cumque. Accusamus fugiat architecto rerum animi atque eveniet, quo, praesentium dignissimos</p>

          <div class="d-flex align-items-center author">
            <div class="photo"><img src="assets/img/person-7.jpg" alt="" class="img-fluid"></div>
            <div class="name">
              <h3 class="m-0 p-0">Esther Howard</h3>
            </div>
          </div>
        </div>

        <div class="post-entry-1 border-bottom">
          <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
          <h2 class="mb-2"><a href="single-post.html">The Best Homemade Masks for Face (keep the Pimples Away)</a></h2>
          <span class="author mb-3 d-block">Jenny Wilson</span>
        </div>

        <div class="post-entry-1">
          <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
          <h2 class="mb-2"><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
          <span class="author mb-3 d-block">Jenny Wilson</span>
        </div>

      </div>

      <div class="col-lg-8">
        <div class="row g-5">
          <div class="col-lg-4 border-start custom-border">
            <div class="post-entry-1">
              <a href="single-post.html"><img src="assets/img/post-landscape-6.jpg" alt="" class="img-fluid"></a>
              <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
              <h2><a href="single-post.html">Let’s Get Back to Work, New York</a></h2>
            </div>
            <div class="post-entry-1">
              <a href="single-post.html"><img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid"></a>
              <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 17th '22</span></div>
              <h2><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
            </div>
            <div class="post-entry-1">
              <a href="single-post.html"><img src="assets/img/post-landscape-4.jpg" alt="" class="img-fluid"></a>
              <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Mar 15th '22</span></div>
              <h2><a href="single-post.html">Why Craigslist Tampa Is One of The Most Interesting Places On the Web?</a></h2>
            </div>
          </div>
          <div class="col-lg-4 border-start custom-border">
            <div class="post-entry-1">
              <a href="single-post.html"><img src="assets/img/post-landscape-3.jpg" alt="" class="img-fluid"></a>
              <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
              <h2><a href="single-post.html">6 Easy Steps To Create Your Own Cute Merch For Instagram</a></h2>
            </div>
            <div class="post-entry-1">
              <a href="single-post.html"><img src="assets/img/post-landscape-2.jpg" alt="" class="img-fluid"></a>
              <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Mar 1st '22</span></div>
              <h2><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
            </div>
            <div class="post-entry-1">
              <a href="single-post.html"><img src="assets/img/post-landscape-1.jpg" alt="" class="img-fluid"></a>
              <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
              <h2><a href="single-post.html">5 Great Startup Tips for Female Founders</a></h2>
            </div>
          </div>
          <div class="col-lg-4">

            <div class="post-entry-1 border-bottom">
              <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
              <h2 class="mb-2"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
              <span class="author mb-3 d-block">Jenny Wilson</span>
            </div>

            <div class="post-entry-1 border-bottom">
              <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
              <h2 class="mb-2"><a href="single-post.html">17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</a></h2>
              <span class="author mb-3 d-block">Jenny Wilson</span>
            </div>

            <div class="post-entry-1 border-bottom">
              <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
              <h2 class="mb-2"><a href="single-post.html">9 Half-up/half-down Hairstyles for Long and Medium Hair</a></h2>
              <span class="author mb-3 d-block">Jenny Wilson</span>
            </div>

            <div class="post-entry-1 border-bottom">
              <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
              <h2 class="mb-2"><a href="single-post.html">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
              <span class="author mb-3 d-block">Jenny Wilson</span>
            </div>

            <div class="post-entry-1 border-bottom">
              <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
              <h2 class="mb-2"><a href="single-post.html">The Best Homemade Masks for Face (keep the Pimples Away)</a></h2>
              <span class="author mb-3 d-block">Jenny Wilson</span>
            </div>

            <div class="post-entry-1 border-bottom">
              <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
              <h2 class="mb-2"><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
              <span class="author mb-3 d-block">Jenny Wilson</span>
            </div>

          </div>
        </div>
      </div>

    </div> <!-- End .row -->
  </div>
</section><!-- End Lifestyle Category Section -->

</main>