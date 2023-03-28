<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Đăng nhập</title>
        <link href="{{asset('backend/css/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{session('error')}}
                                    </div>
                                    @endif
                                    @if(session('msg'))
                                    <div class="alert alert-danger">
                                        {{session('msg')}}
                                    </div>
                                @endif
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Đăng nhập</h3></div>
                                    <div class="card-body">
                                        <form action="{{route('admin.check-login')}}" method="POST">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email"  id="inputEmail" type="email" placeholder="Địa chỉ email" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                           
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary">Login</button>
                                            </div>

                                        </form>
                                    </div>          
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend/js/scripts.js')}}"></script>
    </body>
</html>


{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - Login</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="{{asset('login/vendors/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('login/vendors/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('login/vendors/themify-icons/themify-icons.css')}}">
	<link rel="stylesheet" href="{{asset('login/vendors/linericon/style.css')}}">
  <link rel="stylesheet" href="{{asset('login/vendors/owl-carousel/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('login/vendors/owl-carousel/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('login/vendors/nice-select/nice-select.css')}}">
  <link rel="stylesheet" href="{{asset('login/vendors/nouislider/nouislider.min.css')}}">

  <link rel="stylesheet" href="{{asset('login/css/style.css')}}">
</head>
<body style="text-align: center">
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Đăng nhập Admin</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb"></nav>
				</div>
			</div>
		</div>
	</section>
    
	<section class="login_box_area section-margin" style="display: flex; justify-content: center; align-items: center;">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            @if(session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
            @endif
            @if(session('msg'))
            <div class="alert alert-danger">
                {{session('msg')}}
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="">
                    <div class="login_form_inner">
                        <h3>Log in to enter</h3>
                        <form class="row login_form" action="{{route('admin.check-login')}}" method="POST" id="contactForm">
                            <div class="col-md-12 form-group">
                                <input class="form-control" name="email"  id="inputEmail" type="email" placeholder="Địa chỉ email" />
                            </div>
                            <div class="col-md-12 form-group">
                                <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" />
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="button button-login w-100">Đăng nhập</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{asset('login/vendors/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('login/vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('login/vendors/skrollr.min.js')}}"></script>
    <script src="{{asset('login/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('login/vendors/nice-select/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('login/vendors/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('login/vendors/mail-script.js')}}"></script>
    <script src="{{asset('login/js/main.js')}}"></script>
</body>

</html> --}}