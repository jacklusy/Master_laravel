@extends('frontend.master_dashboard')

@section('main')
    <div class="page-header mt-30 mb-50">
        <div class="container">
            <div class="archive-header">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                        <h1 class="mb-15">Shop</h1>
                        <div class="breadcrumb">
                            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                            <span></span>Shop
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row flex-row-reverse">
            <div class="col-lg-4-5">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p>We found <strong class="text-brand">{{count($products)}}</strong> items for you!</p>
                    </div>
                   
                </div>
                <div class="row product-grid">

                    @foreach ($products as $product)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
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
                                    <h2><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}}</a></h2>

                                    
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
    
                                <span class="count">{{count($products)}}</span>
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
                                <p><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}}</a></p>
                                
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