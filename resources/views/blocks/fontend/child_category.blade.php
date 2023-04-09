{{-- @if ($categoryChil->childrenCategories->count())
<li class="dropdown"><a href="#"><span>{{$categoryChil->name}}</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
    <ul>
    @foreach ($categoryP->childrenCategories as $categoryChil)
    <li><a href="{{route('category', $categoryChil->slug)}}">{{$categoryChil->name}}</a></li>
    @endforeach
    </ul>
@endif --}}



