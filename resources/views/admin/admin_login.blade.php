<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('adminbackend/assets/images/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('adminbackend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminbackend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminbackend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('adminbackend/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('adminbackend/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('adminbackend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminbackend/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('adminbackend/assets/css/icons.css') }}" rel="stylesheet">
    <title>Admin Login </title>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('adminbackend/css/login.css')}}">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">


</head>

<body>


    <x-auth-session-status class="mb-4" :status="session('status')" />


    {{-- <style>
        .Contact,.Home,.About,.Events{
            background-color: none;
        }
        .Login {
            background-color: #E53854;
        }
    </style> --}}


    {{-- @include('navbar') --}}

    <div class="main-content">
        <div class="container mt-7">
                <!-- Table -->
            <div class="row2">
                <div class="col-xl-8 m-auto order-xl-1">
                    <div class="card bg-secondary shadow">
                        <h2 class="mb-5">Login</h2>
                    
                        @if (count($errors) > 0)
                        <?php redirect('login'); ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <div class="card-body">
                            {{-- {{route('postlogin')}} --}}
                        <form  method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="pl-lg-4">
                            <div class="row2">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="email" :value="__('Email')" >Email address</label>
                                        <input type="email" class="form-control form-control-alternative  block mt-1 w-full"  placeholder="jesse@example.com" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    
                                    </div>
                                </div>
                            
                            </div>
                            <div class="row2">
                                <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label"  for="password" :value="__('Password')">Password</label>
                                    <input  type="Password" 
                                            class="form-control form-control-alternative  block mt-1 w-full" 
                                            placeholder="First name" 
                                            value="Lucky"
                                            id="password" 
                                            name="password"
                                            required autocomplete="current-password">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                    <br>
                                    
                                    <p>Don't have account ?<a href="register">Register</a></p>
                                </div>
                                </div>
                            </div>  
                            </div>
                            <div class="col-4 text-right">
                                <button class="ml-3">
                                    <span>{{ __('Log in') }}</span>
                                </button>
                            </div>

                            <hr class="my-4">
                            
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('footer') --}}

    <script type="text/javascript" src="JS/log-reg.js"></script>

    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="{{ asset('adminbackend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('adminbackend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('adminbackend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('adminbackend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('adminbackend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function () {
            $("#show_hide_password a").on('click', function (event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
    <!--app JS-->
    <script src="{{ asset('adminbackend/assets/js/app.js') }}"></script>

</body>

</html>