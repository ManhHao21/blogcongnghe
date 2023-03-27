
@if ($categoryP->childrenCategories->count())
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_2">
        @foreach ($categoryP->childrenCategories as $categoryChil)
        <div class="dropdown-item dropdown-submenu">
            <a class="nav-link dropdown-toggle" href="{{route('category', $categoryP->slug)}}" id="dropdownMenuButton2" data-toggle="dropdown"
                                aria-expanded="false">{{$categoryChil->name}} <span class="sr-only">(current)</span></a>
        @include('blocks.fontend.child_category', ['categoryP' => $categoryChil])
        </div>
        @endforeach
    </div>
@endif



