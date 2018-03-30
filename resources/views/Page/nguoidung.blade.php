<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="source/assets/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="source/assets//assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Profile - Now Ui Kit</title>
    <base href="{{asset('')}}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="source/assets/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="source/assets/assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="source/assets/assets/css/demo.css" rel="stylesheet" />
    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
  </script>
</head>

<body class="login-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            <div class="dropdown button-dropdown">
                <a href="#pablo" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                    <span class="button-bar"></span>
                    <span class="button-bar"></span>
                    <span class="button-bar"></span>
                </a>
            </div>
            <div class="navbar-translate">
                <a class="navbar-brand" href="index" rel="tooltip" title="Truy cập vào trang chủ" >
                    Trang Chủ
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="source/assets/assets/img/blurred-image-1.jpg">
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="page-header" filter-color="orange">
        <div class="page-header-image" style="background-image:url(source/image/product/111.jpg)"></div>
        <div class="container">
            <div class="col-md-4 content-center">
                <div class="card card-login card-plain">
                    @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        {{$err}}<br>
                        @endforeach
                    </div>
                    @endif

                    @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                    @endif
                    <form action="{{route('nguoidungSua')}}" method="post" class="beta-form-checkout">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="header header-primary text-center">
                            <div class="logo-container">
                                <img src="source/assets/assets/img/now-logo.png" alt="">
                            </div>
                        </div>
                        <div class="content">
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons users_circle-08"></i>
                                </span>
                                <input type="text" name="name" class="form-control" value="{{Auth::user()->full_name}}">
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_email-85"></i>
                                </span>
                                <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}" readonly>
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons tech_mobile"></i>
                                </span>
                                <input type="text" name="phone" class="form-control" value="{{Auth::user()->phone}}">
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons business_bank"></i>
                                </span>
                                <input type="text" name="address" class="form-control" value="{{Auth::user()->address}}">
                            </div>
                            <div class="input-group form-group-no-border input-lg">                             
                                <input type="checkbox" id="changePassword" name="changePassword">
                                <label>Đổi mật khẩu</label>
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                               <span class="input-group-addon">
                                <i class="now-ui-icons text_caps-small"></i>
                            </span>
                            <input type="password" name="password" class="form-control password" placeholder="Nhập mật khẩu" aria-describedby="basic-addon1" disabled>
                        </div>
                        <div class="input-group form-group-no-border input-lg">
                            <span class="input-group-addon">
                                <i class="now-ui-icons text_caps-small"></i>
                            </span>
                            <input type="password" name="passwordAgain" class="form-control password" placeholder="Nhập lại mật khẩu" aria-describedby="basic-addon1" disabled>
                        </div>
                    </div>
                    <div class="footer text-center">
                        <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#changePassword').change(function(){
                if($(this).is(":checked"))
                {
                    // console.log('alert'); check lỗi script k
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>

    <footer class="footer">
        <div class="container">
            <div class="copyright">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>, Designed by
                <a href="http://www.invisionapp.com" target="_blank">Invision</a>. Coded by
                <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
            </div>
        </div>
    </footer>
</div>
</body>

<!--   Core JS Files   -->
<script src="source/assets/assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="source/assets/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="source/assets/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="source/assets/assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="source/assets/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="source/assets/assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="source/assets/assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>

</html>