@extends('dashboard')


@section('user')


@php
    $route = Route::current()->getName();
@endphp
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Account Details
        </div>
    </div>
</div>
<div class="page-content pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row">
                    <div class="col-md-3">
                        <div class="dashboard-menu">
                            <ul class="nav flex-column" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link {{ ($route ==  'dashboard')? 'active':  '' }} "   href="{{route('dashboard')}}" ><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ ($route ==  'user.order.page')? 'active':  '' }} "  href="{{route('user.order.page')}}"  ><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link {{ ($route ==  'dashboard')? 'active':  '' }} "   href="#track-orders"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
                                </li> --}}
                                {{-- <li class="nav-item">
                                    <a class="nav-link {{ ($route ==  'dashboard')? 'active':  '' }} "   href="#address"  ><i class="fi-rs-marker mr-10"></i>My Address</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link {{ ($route ==  'user.account.page')? 'active':  '' }} "   href="{{route('user.account.page')}}"  ><i class="fi-rs-user mr-10"></i>Account details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ ($route ==  'user.change.password')? 'active':  '' }} "  href="{{route('user.change.password')}}"  ><i class="fi-rs-user mr-10"></i>Change Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link "  href="{{route('user.logout')}}"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content account dashboard-content pl-50">
                            @yield('UserDach')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection