 <div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
    <div class="container">
        <nav class="navbar navbar-toggleable-md navbar-light ">
            <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('index')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    @foreach ($categories as $categoryP)
                <li class="nav-item dropdown">
                    @if ($categoryP->childrenCategories->count())
                        <a class="nav-link dropdown-toggle" href="{{route('category', $categoryP->slug)}}" id="dropdownMenuButton2" data-toggle="dropdown"
                            aria-expanded="false">{{$categoryP->name}} <span class="sr-only">(current)</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                            <ul>
                                @foreach ($categoryP->childrenCategories as $categoryChil)
                                    <li class="" style="list-style-type: none;"><a class="dropdown-item d-flex align-items-center" href="{{route('category', $categoryChil->slug)}}">{{$categoryChil->name}}</a></li>
                                    @include('blocks.fontend.child_category', ['categoryP' => $categoryChil])
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <a class="nav-link" href="{{route('category', $categoryP->slug)}}">{{$categoryP->name}}</a>
                    @endif
                </li>
            @endforeach
             <li class="nav-item ml-auto">
                <a class="nav-link" href="{{route('Auth.login')}}"><i class="fa fa-sign-in"></i> Đăng nhập</a>
            </li>
            <li class="nav-item ml-auto">
                <a class="nav-link" href="{{route('Auth.logout')}}"><i class="fa fa-sign-in"></i> Đăng Xuất</a>
            </li>
                </ul>
            </div>
        </nav>
    </div>
</div>




<style>
    .nav-link {
    font-size: 1.1rem;
    font-family: sans-serif;
}
   
</style>