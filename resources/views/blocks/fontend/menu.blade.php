<div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
    <div class="container padding_786">
        <nav class="navbar navbar-toggleable-md navbar-light ">
            <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
            <a class="navbar-brand" href="#"><img src="{{asset('clients/images/logo.png')}}" alt="img" class="mobile_logo_width"/></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">aaaaaaaaaaaaaaaaa
                    @foreach($categories as $item)
                    {{$item->name}}
                        {{-- @if(count($category->children) > 0)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton{{ $category->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $category->name }}</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $category->id }}">
                                    @foreach($category->children as $child)
                                        <a class="dropdown-item" href="#">{{ $child->name }}</a>
                                    @endforeach
                                </div>
                            </li>
                        @else --}}
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="#">{{ $category->name }}</a>
                            </li>
                        @endif --}}
                    @endforeach
                </ul> 
                {{-- <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    @foreach ($category as $item)
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('category', $item->slug)}}">{{$item->name}} <span class="sr-only">(current)</span></a>
                    </li>
                    @endforeach
                   
                    <li class="nav-item ">
                        <a class="nav-link" href="Contact_us.html">Contact <span class="sr-only">(current)</span></a>
                    </li>
                </ul> --}}
                {{-- <ul class="navbar-nav mr-auto">
                    @foreach($categories as $category)
                        @if($category->parent_id === null)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton{{ $category->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $category->name }}</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $category->id }}">
                                    @if ($category->parent_id === $category->id)
                                        @foreach($category->children as $child)
                                        <a class="dropdown-item" href="#">{{ $child->name }}</a>
                                        @endforeach
                                    @endif
                                   
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul> --}}
                                         
            </div>
        </nav>
    </div>
</div>