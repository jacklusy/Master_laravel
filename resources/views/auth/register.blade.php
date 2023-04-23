<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    
    <title>3DIMEN</title>
    
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/img/3D.png')}} " />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/main.css?v=5.3')}} " />
</head>

<body>
    
    <!-- Quick view -->
    @include('frontend.body.quickview')

    <!-- Header  -->
    @include('frontend.body.header')

    <!--End header-->

    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span>  My Account
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row SignIn">
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all ">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">New To 3DIMEN</h1>
                                        </div>
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <div class="form-group">
                                                <label for="email">Username:</label>
                                                <input type="text" id="name" required="" name="name" />
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email address:</label>
                                                <input type="email"  id="email" required="" name="email" />
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Password:</label>
                                                <input required=""  id="password"  type="password" name="password" />
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Password Confirmation:</label>
                                                <input required="" id="password_confirmation" type="password" name="password_confirmation" />
                                            </div>
                                            
                                            <div class="login_footer form-group mb-50">
                                                <p class="mb-30">Already have an account? <a href="{{ route('login') }}">Login</a></p>
                                            </div>
                                            <div class="form-group mb-30">
                                                <button type="submit" class="CheckOut btn mb-20 w-100" name="login">CONTINUE</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
  
    @include('frontend.body.footer')

    <!-- Preloader Start -->

    {{-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{asset('frontend/assets/imgs/theme/loading.gif')}} " alt="" />
                </div>
            </div>
        </div>
    </div> --}}
    
    <!-- Vendor JS-->
    <script src="{{asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js')}} "></script>
    <script src="{{asset('frontend/assets/js/vendor/jquery-3.6.0.min.js')}} "></script>
    <script src="{{asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js')}} "></script>
    <script src="{{asset('frontend/assets/js/vendor/bootstrap.bundle.min.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/slick.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/jquery.syotimer.min.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/waypoints.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/wow.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/perfect-scrollbar.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/magnific-popup.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/select2.min.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/counterup.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/jquery.countdown.min.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/images-loaded.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/isotope.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/scrollup.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/jquery.vticker-min.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/jquery.theia.sticky.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/jquery.elevatezoom.js')}} "></script>
    <!-- Template  JS -->
    <script src="{{asset('frontend/assets/js/main.js?v=5.3')}} "></script>
    <script src="{{asset('frontend/assets/js/shop.js?v=5.3')}} "></script>
</body>

</html>