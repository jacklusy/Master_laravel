@extends('frontend.master_dashboard')

@section('main')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
            </div>
        </div>
    </div>
        
    <div class="container mb-30">
        <div class="row flex-row-reverse">
            <div class="col-lg-4-5">
                
                <div class="row product-grid">

                    @foreach ($products as $product)
                        <div class="col-lg-1-6 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                            <img class="default-img" src="{{asset($product->product_thambnail)}}" alt="" />
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
                                    <div class="product-category">
                                        {{-- <a href="shop-grid-right.html">{{$product['category']['category_name']}}</a> --}}
                                    </div>
                                    <h2 class="long-paragraph"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}" >{{$product->product_name}}</a></h2>

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
                                    <div class="product-card-bottom">
                                        
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
                        </div>
                    @endforeach

                    <!--end product card-->
                </div>
                <!--product grid-->
               
                
                <!--End Deals-->

                
            </div>
            <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                <div class="sidebar-widget widget-category-2 mb-30">
                    <h5 class="section-title style-1 mb-30">Category</h5>

                    <ul>
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ url('product/category/'.$category->id.'/'.$category->category_slug) }}"> <img src="{{asset($category->category_image)}}" alt="" />{{$category->category_name}}</a>
                                
                                @php
                                    $products = App\Models\Product::where('category_id',$category->id)->get();
                                @endphp
    
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Fillter By Price -->
               
                <!-- Product sidebar Widget -->
                <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                    <h5 class="section-title style-1 mb-30">New products</h5>

                    @foreach ($newProduct as $product)
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="{{ asset($product->product_thambnail) }}" alt="#" />
                            </div>
                            <div class="content pt-10">
                                <p class="long-paragraph"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}}</a></p>
                                
                                @if ($product->discount_price == NULL)
                                    <p class="price mb-0 mt-5">${{$product->selling_price}}</p>
                                @else
                                    <p class="price mb-0 mt-5">${{$product->discount_price}}</p>
                                @endif

                               

                                
                            </div>
                        </div>
                    @endforeach
                   
                </div>
                
            </div>
        </div>
    </div>
@endsection