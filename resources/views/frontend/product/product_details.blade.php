@extends('frontend.master_dashboard')

@section('main')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> <a href="shop-grid-right.html">{{$product['category']['category_name']}}</a> <span></span> {{$product->product_name}}
            </div>
        </div>
    </div>
    <div class="container col-12 mb-30">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <div class="product-detail accordion-detail">
                    <div class="row mb-50 mt-30">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    
                                    @foreach ($multiImg as $img)
                                        <figure class="border-radius-10">
                                            <img src="{{ asset($img->photo_name) }}" alt="product image" />
                                        </figure>
                                    @endforeach
                                
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails">

                                    @foreach ($multiImg as $img)
                                        <div><img src="{{ asset($img->photo_name) }}" alt="product image" /></div>
                                    @endforeach

                                </div>
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">


                                <h2 class="title-detail">{{$product->product_name}}</h2>
                                <div class="product-detail-rating">
                                    <div class="product-rate-cover text-end">
                
                                        @php
                
                                        $reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                
                                        $avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                                        @endphp
                                        
                
                                        <div class="product-rate d-inline-block">
                                            @if($avarage == 0)
                                            
                                            @elseif($avarage == 1 || $avarage < 2)                     
                                            <div class="product-rating" style="width: 20%"></div>
                                            @elseif($avarage == 2 || $avarage < 3)                     
                                            <div class="product-rating" style="width: 40%"></div>
                                            @elseif($avarage == 3 || $avarage < 4)                     
                                            <div class="product-rating" style="width: 60%"></div>
                                            @elseif($avarage == 4 || $avarage < 5)                     
                                            <div class="product-rating" style="width: 80%"></div>
                                            @elseif($avarage == 5 || $avarage < 5)                     
                                            <div class="product-rating" style="width: 100%"></div>
                                            @endif
                                        </div>
                
                
                
                                        <span class="font-small ml-5 text-muted"> ({{ count($reviewcount)}} reviews)</span>
                                    </div>
                                </div>

                                <br>

                                @php
                                    $amount = $product->selling_price - $product->discount_price;
                                    $discount = ($amount/$product->selling_price)*100;
                                @endphp
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">

                                        @if ($product->discount_price == NULL)
                                            <span class="current-price text-brand">${{$product->selling_price}}</span>
                                        @else

                                            <span class="current-price text-brand">${{$product->discount_price}}</span>
                                            <span>
                                                <span class="save-price font-md color3 ml-15">{{round($discount)}}% Off</span>
                                                <span class="old-price font-md ml-15">${{$product->selling_price}}</span>
                                            </span>
                                        @endif
                                    
                                    </div>
                                </div>
                                

                                <form action="{{url('/cart/data/store/'.$product->id)}}" method="POST">
                                    @csrf

                                    @if ($product->product_size == Null)
                                        
                                    @else
                                        <div class="attr-detail attr-size mb-30">
                                            <strong class="mr-10" style="width: 50px;">Size : </strong>
                                            <select class="form-control unicase-form-control" name="size" id="size">
                                                <option selected disabled>--Choose Size --</option>

                                                @foreach ($product_size as $size)
                                                    <option value="{{$size}}">{{ucwords($size)}}</option>
                                                    {{-- ucwords ==  used to convert the first character of each word in a string to uppercase. --}}
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                    @if ($product->product_color == Null)
                                        
                                    @else
                                        <div class="attr-detail attr-size mb-30">
                                            <strong class="mr-10" style="width: 50px;">Color : </strong>
                                                <select class="form-control unicase-form-control" name="color" id="color">
                                                    <option selected disabled>--Choose Color --</option>

                                                    @foreach ($product_color as $color)
                                                        <option value="{{$color}}">{{ucwords($color)}}</option>
                                                        {{-- ucwords ==  used to convert the first character of each word in a string to uppercase. --}}
                                                    @endforeach
                                                </select>
                                        </div>
                                    @endif
                                
                                    <div class="detail-extralink mb-50">
                                        <div class="detail-qty border radius">
                                            <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                            <input type="text" name="quantity" class="qty-val" value="1" min="1" id="quantity">
                                            <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                        <div class="product-extra-link2">
                                            <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>ADD TO BAG</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="short-desc mb-30">
                                    <p class="font-lg">{!! $product->long_descp !!}</p>
                                </div>
                            
                                <hr>
                                <div class="font-xs">
                                    <ul class="mr-50 float-start">
                                        <li class="mb-5">Brand: <span class="text-brand">{{$product['Brand']['brand_name']}}</span></li>
                                        <li class="mb-5">Category:<span class="text-brand">{{$product['category']['category_name']}}</span></li>
                                    </ul>
                                    <ul class="float-start">
                                        <li class="mb-5">Product Code: <a href="#">{{$product->product_code}}</a></li>
                                        <li>Stock:<span class="in-stock text-brand ml-5">({{$product->product_qty}}) Items In Stock</span></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="tab-style3">
                            
                            <div class="tab-content shop_info_tab entry-main-content">
                            
                                <!--Comments-->
                                <div class="comments-area">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h4 class="mb-30">Customer questions & answers</h4>
                                            <div class="comment-list">
                                                @php
                                                    $reviews = App\Models\Review::where('product_id',$product->id)->latest()->limit(5)->get();
                                                @endphp
                            
                                                @foreach($reviews as $item)
                                                    
                                                    @if($item->status == 0)
                            
                                                    @else 
                            
                                                    <div class="single-comment justify-content-between d-flex mb-30">
                                                        <div class="user justify-content-between d-flex">
                                                            <div class="thumb text-center">
                                                                <img src="{{ (!empty($item->user->photo)) ? url('upload/user_images/'.$item->user->photo):url('upload/no_image.jpg') }}" alt="" />
                                                                <a href="#" class="font-heading text-brand">{{ $item->user->name }}</a>
                                                            </div>
                                                            <div class="desc">
                                                                <div class="d-flex justify-content-between mb-10">
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="font-xs text-muted"> {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }} </span>
                                                                    </div>
                                                                    
                                                                    <div class="product-rate d-inline-block">
                            
                                                                        @if($item->rating == NULL)
                                                                            @elseif($item->rating == 1)
                                                                            <div class="product-rating" style="width: 20%"></div>
                                                                            @elseif($item->rating == 2)
                                                                            <div class="product-rating" style="width: 40%"></div>
                                                                            @elseif($item->rating == 3)
                                                                            <div class="product-rating" style="width: 60%"></div>
                                                                            @elseif($item->rating == 4)
                                                                            <div class="product-rating" style="width: 80%"></div>
                                                                            @elseif($item->rating == 5)
                                                                            <div class="product-rating" style="width: 100%"></div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <p class="mb-10">{{ $item->comment }} </p>
                                                            </div>
                                                        </div>
                                                    </div>
                            
                                                    @endif
                            
                            
                                                @endforeach
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--comment form-->

                                <div class="comment-form">
                                    <h4 class="mb-15">Add a review</h4>
                                    @guest
                                        <p> <b>For Add Product Review. You Need To Login First <a
                                                    href="{{ route('login')}}">Login Here </a> </b></p>
                                    @else
                                        <div class="row">
                                            <div class="col-lg-8 col-md-12">
                                                
                                                <form class="form-contact comment_form" action="{{ route('store.review') }}" method="post" id="commentForm">
                                                    @csrf

                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                                                    <div class="row">
                                                
                                                        <div class="col-md-12">
                                                
                                                            <div class="stars">
                                                
                                                
                                                                    <input class="star star-5 radio-sm" id="star-5" type="radio" value="5" name="quality" />
                                                
                                                                    <label class="star star-5 radio-sm" for="star-5"></label>
                                                
                                                                    <input class="star star-4 radio-sm" id="star-4" type="radio" value="4" name="quality" />
                                                
                                                                    <label class="star star-4 radio-sm" for="star-4"></label>
                                                
                                                                    <input class="star star-3 radio-sm" id="star-3" type="radio" value="3" name="quality" />
                                                
                                                                    <label class="star star-3 radio-sm" for="star-3"></label>
                                                
                                                                    <input class="star star-2 radio-sm" id="star-2" type="radio" value="2" name="quality" />
                                                
                                                                    <label class="star star-2 radio-sm" for="star-2"></label>
                                                
                                                                    <input class="star star-1 radio-sm" id="star-1" type="radio" value="1" name="quality" />
                                                
                                                                    <label class="star star-1 radio-sm" for="star-1"></label>
                                                
                                                            </div>
                                                
                                                
                                                
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <textarea class="form-control w-100" required name="comment" id="comment"
                                                                    cols="30" rows="9" placeholder="Write Comment"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="button button-contactForm">Submit
                                                            Review</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endguest
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row mt-60" >
                <div class="col-12">
                    <h2 class="section-title style-1 mb-30">Customers Also Viewed</h2>
                </div>
                <div class="col-12 container ">
                    <div class="row related-products">
                        @foreach ($relatedProduct as $product)
                            
                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap hover-up">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}" tabindex="0">
                                                <img class="default-img RelatedImage" src="{{ asset($product->product_thambnail) }}" alt="" />
                                            </a>
                                        </div>
                                    
                                        @php
                                            $amount = $product->selling_price - $product->discount_price;
                                            $discount = ($amount/$product->selling_price)*100;
                                        @endphp
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            @if ($product->discount_price == NULL)
                                                <span class="new">New </span>
                                            @else
                                                <span class="hot">{{round($discount)}}% </span>
                                            @endif
                                        </div>
                                        
                                    </div>
                                    <div class="product-content-wrap">
                                    
                                        
                                        @if ($product->discount_price == NULL)
                                            <div class="product-price">
                                                <span>${{$product->selling_price}}</span>
                                            </div>
                                        @else
                                            <div class="product-price">
                                                <span>${{$product->discount_price}}</span>
                                                <span class="old-price">${{$product->selling_price}}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection