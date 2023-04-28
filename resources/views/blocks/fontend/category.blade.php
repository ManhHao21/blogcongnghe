
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
                <div class="post-meta"><span class="date">{{ $item->user->name }}</span> <span class="mx-1">&bullet;</span> <span>{{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}}</span></div>
                <h3><a href="{{route('post', $item->slug)}}">{{$item->title}}</a></h3>
                <p>{{$item->description}}</p>
              </div>
            </div>
            @endforeach
          <div class="d-flex justify-content-center">
            {{$posts ->links()}}
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
                  <li><a href="category.html">{{$item->name}}</a></li>
                @endforeach
              </ul>
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