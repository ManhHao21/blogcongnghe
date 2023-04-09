
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="{{route('index')}}" class="logo d-flex align-items-center">
        <h1>Báo công nghệ</h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
            <li><a href="{{route('index')}}">Home</a></li>
            @foreach ($categories as $categoryP)
            {{-- <li><a href="{{route('category', $categoryP->slug)}}">{{$categoryP->name}}</a></li> --}}
            <li class="dropdown"><a href="{{route('category', $categoryP->slug)}}"><span>{{$categoryP->name}}</span> 
            @if ($categoryP->childrenCategories->count())
            <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                        @foreach ($categoryP->childrenCategories as $categoryChil)
                        <li><a href="{{route('category', $categoryChil->slug)}}">{{$categoryChil->name}}</a></li>
                        @include('blocks.fontend.child_category', ['categoryP' => $categoryChil])
                </ul>
            </li>
            @endforeach
            @endif
            @endforeach
            <li><a href="{{route('contact.index')}}">Liên hệ</a></li>
        </ul>
      </nav>
       <div class="position-relative">
     

        <a href="#" class="js-search-open"><span class="bi-search"></span></a>
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
          <form action="search-result.html" class="search-form">
            <span class="icon bi-search"></span>
            <input type="text" placeholder="Search" class="form-control">
            <button class="btn js-search-close"><span class="bi-x"></span></button>
          </form>
        </div>

      </div> 
    </div>
  </header>
