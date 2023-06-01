<footer id="footer" class="footer">
<div class="footer-content">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-4">
        <h3 class="footer-heading">About ZenBlog</h3>
        <p>Tin tức công nghệ là một lĩnh vực cực kỳ phát triển và đang được quan tâm rất nhiều trong thời đại số. Nó cung cấp thông tin về các sản phẩm công nghệ mới, các xu hướng tiên tiến, các sự kiện và cập nhật về các công nghệ hiện có. Các trang web và tờ báo công nghệ cung cấp thông tin về các sản phẩm mới nhất của các nhà sản xuất hàng đầu, bao gồm điện thoại thông minh, máy tính bảng, máy tính xách tay, máy ảnh số, TV thông minh, loa thông minh, đồng hồ thông minh, thiết bị gia đình thông minh và nhiều hơn nữa.</p>
      </div>
      <div class="col-6 col-lg-2">
        <h3 class="footer-heading">Tag</h3>
        <ul class="footer-links list-unstyled">
          @foreach ($categori as $item )
            <li><a href="index.html"><i class="bi bi-chevron-right"></i>{{$item->name}}</a></li>
          @endforeach
          
        </ul>
      </div>
      <div class="col-3">
        <h3 class="footer-heading">Tin tức mới</h3>
        <ul class="footer-links footer-blog-entry list-unstyled">
          @foreach ($categoryNew as $item)
            <li>
            <a href="{{route('post', $item->slug)}}" class="d-flex align-items-center">
              <img src="{{$item->imageUrl()}}" alt="" class="img-fluid me-3">
              <div>
                <div class="post-meta d-block"> <span class="mx-1">&bullet;</span> <span>{{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}}</span></div>
                <span>{{$item->title}}</span>
              </div>
            </a>
          </li>
          @endforeach
        </ul>
      </div>
      <div class="col-3">
        <h3 class="footer-heading">Tin tức mới</h3>
        <ul class="footer-links footer-blog-entry list-unstyled">
          @foreach ($categoryPost as $item)
            <li>
            <a href="{{route('post', $item->slug)}}" class="d-flex align-items-center">
              <img src="{{$item->imageUrl()}}" alt="" class="img-fluid me-3">
              <div>
                <div class="post-meta d-block"> <span class="mx-1">&bullet;</span> <span>{{\Carbon\Carbon::parse($item->create_at)->format('d-m-Y')}}</span></div>
                <span>{{$item->title}}</span>
              </div>
            </a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="footer-legal">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
        <div class="copyright">
          © Copyright <strong><span>Hblog</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
          <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
</footer>