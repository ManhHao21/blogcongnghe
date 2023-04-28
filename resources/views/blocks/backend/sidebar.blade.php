
@if (Auth::user()->is_admin == 1 )
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="{{route('admin.category.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Danh mục
                </a>
                
                {{-- <a class="nav-link" href="{{route('admin.post.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Bài viết --}}

                    <a class="nav-link" href="{{route('admin.post.index')}}" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Bài viết
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{route('admin.post.index')}}">Tất cả bài viết</a>
                            <a class="nav-link" href="{{route('admin.post.approve.index')}}">Duyệt bài viết</a>
                        </nav>
                    </div>
                <a class="nav-link" href="{{route('admin.user.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Người dùng
                </a>
                <a class="nav-link" href="{{route('admin.comment.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Bình luận
                </a>
                <a class="nav-link" href="{{route('admin.contact.index')}}">
                    <div class="sb-nav-link-icon"><i class="fa fa-address-book-o" aria-hidden="true"></i></div>
                    Liên hệ
                </a>
            </div>
                
    </nav>
</div>
@elseif (Auth::user()->is_admin == 0)
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                {{-- <a class="nav-link" href="{{route('admin.category.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Danh mục
                </a> --}}
                <a class="nav-link" href="{{route('admin.post.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Bài viết
                </a>

                {{-- <a class="nav-link" href="{{route('admin.user.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Người dùng
                </a>
                <a class="nav-link" href="{{route('admin.comment.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Bình luận
                </a>
                <a class="nav-link" href="{{route('admin.contact.index')}}">
                    <div class="sb-nav-link-icon"><i class="fa fa-address-book-o" aria-hidden="true"></i></div>
                    Liên hệ
                </a> --}}
            </div>
                
    </nav>
</div>
@endif