<link rel="stylesheet" href="{{asset('frontend/assets/css/my.css')}} " />

<header class="header-area header-style-1 header-height-2">
  
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{ url('/') }}"><img src="{{asset('frontend/img/logo3.png')}} " alt="logo" /></a>
                </div>
                <div class="header-right">
                    
                    <div class="header-action-right">
                        <div class="header-action-2">
                            {{-- <div class="search-location">
                                <form action="{{ route('product.search') }}" method="post">
                                    @csrf

                                </form>
                            </div> --}}
                           
                           
                            
                            <div class="header-action-icon-2">
                                @php
                                    if (Auth::check()) {
                                        $user_id = Auth::user()->id;
                                        $carts = App\Models\Cart::where('user_id',$user_id)->get();
                                        $count = $carts->count();
                                    }
                                @endphp
                                <a class="mini-cart-icon" href="{{route('mycart')}}">
                                    <img alt="Nest" src="{{asset('frontend/assets/imgs/theme/icons/icon-cart.svg')}} " />

                                    @if (Auth::check())
                                        <span class="pro-count blue">{{$count}}</span>
                                    @else
                                        <span class="pro-count blue">0</span>
                                    @endif
                                </a>
                                <a href="{{route('mycart')}}"><span class="lable">Cart</span></a>

                                @if (Auth::check())
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul>
                                            @foreach ($carts as $cart)
                                                <li>
                                                    <div class="shopping-cart-img">
                                                        <a href="{{url('product/details/'.$cart['product']['id'].'/'.$cart['product']['product_slug'])}}"><img alt="Nest" src="{{asset($cart['product']['product_thambnail'])}} " /></a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h4><a href="{{url('product/details/'.$cart['product']['id'].'/'.$cart['product']['product_slug'])}}">{{$cart['product']['product_name']}}</a></h4>
                                                        @if ($cart['product']['discount_price'] == NULL)
                                                            <h4><span>{{$cart->quantity}} × </span>${{$cart['product']['selling_price']}}</h4>
                                                            
                                                        @else
                                                            <h4><span>{{$cart->quantity}} × </span>${{$cart['product']['discount_price']}}</h4>
                                                        @endif
                                                    </div>
                                                    <div class="shopping-cart-delete">
                                                        <a type="submit" href="{{route('delete.cart',$cart->id)}}"><i class="fi-rs-cross-small"></i></a>
                                                    </div>
                                                </li>
                                            
                                            @endforeach
                                        
                                        </ul>
                                        <div class="shopping-cart-footer">
                                            @php
                                                $AllTotal = 0;
                                                foreach ($carts as $cart) {
                                                    $qty = $cart->quantity;
                                                    if ($cart['product']['discount_price'] == NULL) {

                                                        $selling_price = $cart['product']['selling_price'];
                                                        $total = $qty * $selling_price;
                                                        $AllTotal +=$total;
                                                    }else {
                                                        $discount_price = $cart['product']['discount_price'];
                                                        $total = $qty * $discount_price; 
                                                        $AllTotal +=$total;

                                                    }
                                                }
                                            @endphp
                                            <div class="shopping-cart-total">
                                                <h4>Total <span>${{$AllTotal}}</span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="{{route('mycart')}}" class="outline">View cart</a>
                                                <a href="shop-checkout.html">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
                            <div class="header-action-icon-2">
                                
                                @auth
                                
                                        <a href="{{route('dashboard')}}">
                                            <img class="svgInject" alt="Nest" src="{{asset('frontend/assets/imgs/theme/icons/icon-user.svg')}} " />
                                        </a>
                                        <a href="{{route('dashboard')}}"><span class="lable ml-0">Account</span></a>
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                            <ul>
                                                <li>
                                                    <a href="{{route('dashboard')}}"><i class="fi fi-rs-user mr-10"></i>My Account</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('dashboard')}}"><i class="fi fi-rs-location-alt mr-10"></i>Order Tracking</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('dashboard')}}"><i class="fi fi-rs-label mr-10"></i>My Voucher</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('dashboard')}}"><i class="fi fi-rs-heart mr-10"></i>My Wishlist</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('dashboard')}}"><i class="fi fi-rs-settings-sliders mr-10"></i>Setting</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('user.logout')}}"><i class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                                                </li>
                                            </ul>
                                        </div>

                                @else
                                        <a href="{{route('login')}}">
                                            <img class="svgInject" alt="Nest" src="{{asset('frontend/assets/imgs/theme/icons/icon-user.svg')}} " />
                                        </a>
                                        <a href="{{route('login')}}"><span class="lable ml-0">Login /</span></a>
                                        <a href="{{route('register')}}"><span class="lable ml-0">Register</span></a>
                                        
                                @endauth

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        $categories = App\Models\Category::orderBy('category_name','ASC')->limit(6)->get();
    @endphp

    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="index.html"><img src="{{asset('frontend/img/logo3.png')}} " alt="logo" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex col-12">
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                
                                <li>
                                    <a class="active" href="{{ url('/') }}">Home</a>
                                    
                                </li>

                                <li>
                                    <a href="{{route('user.shop.page')}}">Shop</a>
                                </li>
                                
                                <li>
                                    <a href="#">About</a>
                                </li>
                                <li>
                                    <a href="{{route('user.contact.page')}}">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="search-style-2">
                        <form action="{{ route('product.search') }}" method="post">
                            @csrf
                            <input name="search" placeholder="Search for items..." />
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </form>
                    </div>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
    <!--End header-->


    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="index.html"><img src="{{asset('frontend/img/logo3.png')}}" alt="logo" /></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                    
                </div>
            </div>
    
    
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <div class="search-style-2">
                        <form action="{{ route('product.search') }}" method="post">
                            @csrf
                            <input name="search" placeholder="Search for items..." />
                        </form>
                    </div>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li>
                                <a class="active" href="{{ url('/') }}">Home</a>
                                
                            </li>

                            <li>
                                <a href="{{route('user.shop.page')}}">Shop</a>
                            </li>
                            
                            <li>
                                <a href="#">About</a>
                            </li>
                            <li>
                                <a href="{{route('user.contact.page')}}">Contact</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
    
    
                </div>
                <hr>
                <div class="mobile-social-icon mb-50" style="display: flex">
                    <a href="https://github.com/jacklusy"><i class="fa-brands fa-github"></i></a>
                    <a href="https://www.linkedin.com/in/jack-alloussi-747800260/"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="https://www.instagram.com/accounts/login/"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
