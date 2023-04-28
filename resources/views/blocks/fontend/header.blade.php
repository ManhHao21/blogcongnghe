
<main id="main">

<section id="hero-slider" class="hero-slider">
  <div class="container-md" data-aos="fade-in">
    <div class="row">
      <div class="col-12">
        <div class="swiper sliderFeaturedPosts">
          <div class="swiper-wrapper">
            @foreach ($banner as $item)
            @if($item->is_active == 1)
              <div class="swiper-slide">
                <a href="{{route('post', $item->slug)}}" class="img-bg d-flex align-items-end" style="background-image: url('{{$item->imageUrl()}}');">
                  <div class="img-bg-inner">
                    <h2>{{$item->title}}</h2>
                    <p>{{$item->description}}</p> 
                    <div class="post-meta"><span class="date" style="color: white">{{ $item->user->name }}</span> <span class="mx-1">&bullet;</span> <span>{{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}}</span></div>
                  </div>
                </a>
              </div>
            @endif
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
      <div class="section-header d-flex justify-content-between align-items-center mb-5">
        <h2>Bài viết mới</h2>
      </div>
      <div class="col-lg-4">
        @php $count = 0; @endphp
        @foreach ($new1 as $item)
          @if ($item->is_active== 1 && $count == 0)
          <div class="post-entry-1 lg">
            <a href="{{route('post', $item->slug)}}"><img src="{{$item->imageUrl()}}" alt="" class="img-fluid"></a>
            <div class="post-meta"><span class="date">{{ $item->user->name }}</span> <span class="mx-1">&bullet;</span> <span>{{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}}</span></div>
            <h2><a href="{{route('post', $item->slug)}}">{{$item->title}}</a></h2>
            <p class="mb-4 d-block">{{$item->description}}</p>
          </div>
          @php $count++; @endphp
          @endif
        @endforeach
      </div>
      <div class="col-lg-8">
        <div class="row g-5">
          <div class="col-lg-4 border-start custom-border">
            @foreach ($new2 as $item)
            @if ($item->is_active == 1)
            <div class="post-entry-1">
              <a href="{{route('post', $item->slug)}}"><img src="{{$item->imageUrl()}}" alt="" class="img-fluid"></a>
              <div class="post-meta"><span class="date">{{ $item->user->name }}</span> <span class="mx-1">&bullet;</span> <span>{{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}}</span></div>
              <h2><a href="{{route('post', $item->slug)}}">{{$item->title}}</a></h2>
            </div>
            @endif
            @endforeach

          </div>
          <div class="col-lg-4 border-start custom-border">
            @foreach ($new3 as $item)
            @if($item->is_active == 1)
            <div class="post-entry-1">
              <a href="{{route('post', $item->slug)}}"><img src="{{$item->imageUrl()}}" alt="" class="img-fluid"></a>
              <div class="post-meta"><span class="date">{{ $item->user->name }}</span> <span class="mx-1">&bullet;</span> <span>{{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}}</span></div>
              <h2><a href="{{route('post', $item->slug)}}">{{$item->title}}</a></h2>
            </div>
            @endif
            @endforeach
          </div>

          <!-- Trending Section -->
          <div class="col-lg-4">
            @php
            $items = $xml->xpath('//item');
            shuffle($items);
            $items = array_slice($items, 0, 5);
            @endphp
            <div class="trending">
                <h3>{{$xml->channel->copyright}}</h3>
                <ul class="trending-post">
                    @foreach ($items as $item)
                        <li width="100%" >
                            <a href="{{$item->link}}" target="_blank">
                                <h3 style="font-size: 18px">{{$item->title}}</h3>
                                <span class="author" style="font-size: 13px">{{ $item->copyright }}</span>
                                <span class="author" style="font-size: 13px">{{$item->author}}</span>
                            </a>
                        </li>
                    @endforeach
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
      <h2>Nổi bật</h2>
    </div>

    <div class="row">
      <div class="col-md-9">
        @foreach ($hightlight1 as $item)
           <div class="d-lg-flex post-entry-2">
          <a href="{{route('post', $item->slug)}}" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
            <img src="{{$item->imageUrl()}}" alt="" class="img-fluid">
          </a>
          <div>
            <div class="post-meta"><span class="date"></span><span>{{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}}</span></div>
            <h3><a href="{{route('post', $item->slug)}}">{{$item->title}}</a></h3>
            <p>{{$item->description}}</p>
            <div class="d-flex align-items-center author">
              <div class="photo"><img src="{{$item->imageUrl()}}" alt="" class="img-fluid"></div>
              <div class="name">
                <h3 class="m-0 p-0">{{ $item->user->name }}</h3>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @foreach ($hightlight2 as $item)
        <div class="row">
          <div class="col-lg-4">
            <div class="post-entry-1 border-bottom">
              <a href="{{route('post', $item->slug)}}"><img src="{{$item->imageUrl()}}" alt="" class="img-fluid"></a>
              <div class="post-meta"> <span class="mx-1">&bullet;</span> <span>{{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}}</span></div>
              <h2 class="mb-2"><a href="{{route('post', $item->slug)}}">{{$item->title}}</a></h2>
              <span class="author mb-3 d-block">{{ $item->user->name }}</span>
              <p class="mb-4 d-block">{{$item->description}}</p>
            </div>

            <div class="post-entry-1">
              <div class="post-meta"><span class="mx-1">&bullet;</span> <span>{{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}}</span></div>
              <h2 class="mb-2"><a href="{{route('post', $item->slug)}}">{{$item->title}}</a></h2>
              <span class="author mb-3 d-block">{{ $item->user->name }}</span>
            </div>
          </div>
          @endforeach
          @foreach ($hightlight3 as $item)
          <div class="col-lg-8">
            <div class="post-entry-1">
              <a href="{{route('post', $item->slug)}}"><img src="{{$item->imageUrl()}}" alt="" class="img-fluid"></a>
              <div class="post-meta"> <span class="mx-1">&bullet;</span> <span>{{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}}</span></div>
              <h2 class="mb-2"><a href="{{route('post', $item->slug)}}">{{$item->title}}</a></h2>
              <span class="author mb-3 d-block">{{ $item->user->name }}</span>
              <p class="mb-4 d-block">{{$item->description}}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="col-md-3">
        <h3 style="text-align: center"><a href="{{ $xml1->channel->link }}"{{$xml1->channel->title }}></a></h3>
        @php
        $items = $xml->xpath('//item');
        shuffle($items);
        $items = array_slice($items, 0, 7);
        @endphp
          @foreach ($items as $item)
              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="mx-1">&bullet;</span> <span>{{$item->pubDate}}</span></div>
                <h2 class="mb-2"><a href="{{$item->link}}">{{$item->title}}</a></h2>
                <h2 class="mb-2"><a href="{{$item->link}}" style="font-size: 14px; text-align:center">{{$xml1->channel->generator}}</a></h2>
              </div>
              @endforeach
        </div>
</section>
</main>