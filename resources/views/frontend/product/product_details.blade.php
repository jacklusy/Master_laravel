@extends('frontend.master_dashboard')

@section('main')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> <a href="shop-grid-right.html">{{$product['category']['category_name']}}</a> <span></span> {{$product->product_name}}
            </div>
        </div>
    </div>
    <div class="container mb-30">
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

                                @if ($product->product_qty > 0)
                                    <span class="stock-status in-stock"> In Stock </span>
                                @else
                                    <span class="stock-status out-stock"> Stock Out </span>
                                @endif

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
                                        <li class="mb-5">Tags: <a href="#" rel="tag">{{$product->product_tags}}</a></li>
                                        <li>Stock:<span class="in-stock text-brand ml-5">({{$product->product_qty}}) Items In Stock</span></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="tab-style3">
                            <ul class="nav nav-tabs text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                        href="#Description">Description</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews ({{ count($reviewcount) }})</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab entry-main-content">
                                <div class="tab-pane fade show active" id="Description">
                                    <div class="">
                                        <p> {!! $product->long_descp !!}</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Vendor-info">
                                    <div class="vendor-logo d-flex mb-30">
                                        <img src="assets/imgs/vendor/vendor-18.svg" alt="" />
                                        <div class="vendor-name ml-15">
                                            <h6>
                                                <a href="vendor-details-2.html">Noodles Co.</a>
                                            </h6>
                                            <div class="product-rate-cover text-end">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="contact-infor mb-50">
                                        <li><img src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address:
                                            </strong> <span>5171 W Campbell Ave undefined Kent, Utah 53127 United States</span>
                                        </li>
                                        <li><img src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Contact
                                                Seller:</strong><span>(+91) - 540-025-553</span></li>
                                    </ul>
                                    <div class="d-flex mb-55">
                                        <div class="mr-30">
                                            <p class="text-brand font-xs">Rating</p>
                                            <h4 class="mb-0">92%</h4>
                                        </div>
                                        <div class="mr-30">
                                            <p class="text-brand font-xs">Ship on time</p>
                                            <h4 class="mb-0">100%</h4>
                                        </div>
                                        <div>
                                            <p class="text-brand font-xs">Chat response</p>
                                            <h4 class="mb-0">89%</h4>
                                        </div>
                                    </div>
                                    <p>Noodles & Company is an American fast-casual restaurant that offers international and
                                        American noodle dishes and pasta in addition to soups and salads. Noodles & Company was
                                        founded in 1995 by Aaron Kennedy and is headquartered in Broomfield, Colorado. The
                                        company went public in 2013 and recorded a $457 million revenue in 2017.In late 2018,
                                        there were 460 Noodles & Company locations across 29 states and Washington, D.C.</p>
                                </div>
                                <div class="tab-pane fade" id="Reviews">
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
                                                                    <p class="mb-10">{{ $item->comment }} <a href="#" class="reply">Reply</a></p>
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
                                        <form class="form-contact comment_form" action="#" id="commentForm">
                                            <div class="row">
                                                <table class="table" style=" width: 60%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="cell-level">&nbsp;</th>
                                                            <th>1 star</th>
                                                            <th>2 star</th>
                                                            <th>3 star</th>
                                                            <th>4 star</th>
                                                            <th>5 star</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="cell-level">Quality</td>
                                                            <td><input type="radio" name="quality" class="radio-sm"
                                                                    value="1"></td>
                                                            <td><input type="radio" name="quality" class="radio-sm"
                                                                    value="2"></td>
                                                            <td><input type="radio" name="quality" class="radio-sm"
                                                                    value="3"></td>
                                                            <td><input type="radio" name="quality" class="radio-sm"
                                                                    value="4"></td>
                                                            <td><input type="radio" name="quality" class="radio-sm"
                                                                    value="5"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control w-100" name="comment" id="comment"
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
                    <br>
                    <div class="row mt-60">
                        <div class="col-12">
                            <h2 class="section-title style-1 mb-30">Related products</h2>
                        </div>
                        <div class="col-12">
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
                                                <h2><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}" tabindex="0">{{$product->product_name}}</a></h2>
                                           
                                               
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
        </div>
    </div>
@endsection