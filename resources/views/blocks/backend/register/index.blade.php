<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng kí tài khoản</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('login-new/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('login-new/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    
    
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Đăng kí</h1>
                                @if(count($errors))
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                    {{$err}} <br>
                                    @endforeach
                                @endif
                            </div>
                            <form class="user" method="POST" action="{{route('admin.Auth.check-register')}}">
                                @csrf
                                <div class="form-group ">
                                        <input type="text" name="name" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Nhập họ và tên....">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Nhập email....">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="address" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Nhập địa chỉ....">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Nhập số điện thoại....">
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Nhập mật khẩu....">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="password-comfilm" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Nhập lại mật khẩu">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 di">
                                    <h6 class="mb-2 pb-1">Giới tính: </h6>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" id="femaleGender"
                                        value="1" checked />
                                        <label class="form-check-label" for="femaleGender">Nam</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" id="maleGender"
                                        value="0" />
                                        <label class="form-check-label" for="maleGender">Nữ</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block">
                                    Đăng kí
                                </button>
                            </form>
                            <div class="text-center">
                                <a class="small" href="{{route('admin.login')}}">Quay lại đăng nhập? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('login-new/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('login-new/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('login-new/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('login-new/js/sb-admin-2.min.js')}}"></script>

</body>

</html>