@extends('frontend.masterD')
@section('main')

{{-- @section('title')
{{ $item }} You are searching..
@endsection --}}


<div class="page-header mt-30 mb-50">
    <div class="container">
        <div class="archive-header">
            <div class="row align-items-center">
                <div class="col-xl-3">
                    <div class="breadcrumb">
                        <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                        <span></span> {{ $item }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="page-header mt-30 mb-50">

</div>
<div class="container mb-30">
    <div class="row flex-row-reverse">
        <div class="col-lg-4-5">
            <div class="shop-product-fillter">
                <div class="totall-product" style="padding-left: 20px">
                    <p>We found <strong class="text-brand">{{ count($products) }}</strong> items for you!</p>
                </div>
                <div class="sort-by-product-area">
                    <div class="sort-by-cover mr-10">
                        <div class="sort-by-product-wrap">
                            <div class="sort-by">
                                <span><i class="fi-rs-apps"></i>Show:</span>
                            </div>
                            <div class="sort-by-dropdown-wrap">
                                <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                            </div>
                        </div>
                        <div class="sort-by-dropdown">
                            <ul>
                                <li><a class="active" href="#">50</a></li>
                                <li><a href="#">100</a></li>
                                <li><a href="#">150</a></li>
                                <li><a href="#">200</a></li>
                                <li><a href="#">All</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sort-by-cover">
                        <div class="sort-by-product-wrap">
                            <div class="sort-by">
                                <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                            </div>
                            <div class="sort-by-dropdown-wrap">
                                <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                            </div>
                        </div>
                        <div class="sort-by-dropdown">
                            <ul>
                                <li><a class="active" href="#">Featured</a></li>
                                <li><a href="#">Price: Low to High</a></li>
                                <li><a href="#">Price: High to Low</a></li>
                                <li><a href="#">Release Date</a></li>
                                <li><a href="#">Avg. Rating</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row product-grid">
                @foreach($products as $product)
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="{{ url('product/details/'.$product->id.'/'.$product->product_name) }}">
                                    <img class="default-img" src="{{ asset( $product->product_image ) }}" alt="" />

                                </a>
                            </div>


                            @php
                            $amount = $product->selling_price - $product->discount_price;
                            $discount = ($amount/$product->selling_price) * 100;
                            @endphp


                            <div class="product-badges product-badges-position product-badges-mrg">

                                @if($product->offer== NULL)
                                <span class="new">New</span>
                                @else
                                <span class="hot"> {{ round($discount) }} %</span>
                                @endif


                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="product-category">
                                <a href="shop-grid-right.html">{{ $product['category']['category_name'] }}</a>
                            </div>
                            <h2 style="padding-top: 0px"><a
                                    href="{{ url('product/details/'.$product->id.'/'.$product->product_name) }}"> {{
                                    $product->product_name }} </a></h2>

                            <div class="product-rate-cover">
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
                            <div>
                                <span class="font-small text-muted">{{ $product->product_size }} </a></span>
                            </div>

                            <div class="product-card-bottom">
                                @if($product->discount_price == NULL)
                                <div class="product-price">
                                    <span>{{ $product->selling_price }}JD</span>

                                </div>

                                @else
                                <div class="product-price">
                                    <span>{{ $product->discount_price }}JD</span>
                                    <span class="old-price">{{ $product->selling_price }}JD</span>
                                </div>
                                @endif
                                {{-- <div class="add-cart">
                                    <input type="submit" class="add" value=" Add " style="height: 40px">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!--end product card-->
                @endforeach


                <!--product grid-->
                {{-- <div class="pagination-area mt-20 mb-20">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div> --}}


            </div>
        </div>

        <div class="row flex-row">

            <div class="col-lg-1-5 primary-sidebar sticky-sidebar" style="margin-top: -850px">
                <div class="sidebar-widget widget-category-2 mb-30">
                    <h5 class="section-title style-1 mb-30"
                        style="   font-family: 'object-fit: contain, object-position: 50% 50%'">Category</h5>
                    <ul>

                        <li>
                            <a href="{{ url('/mirror_shop')}}"><img
                                    src=" {{ asset('frontend/assets/imgs/shop/backg.jpg') }} " alt="s" />ALL MIRRORS</a>
                        </li>
                        @foreach($categories as $category)

                        @php
                        $products = App\Models\Product::where('category_id',$category->id)->get();
                        @endphp


                        <li>
                            <a href="{{url('product/category/'.$category->id.'/'.$category->category_name)}}"> <img
                                    src=" {{ asset($category->category_image) }} " alt="" />{{ $category->category_name
                                }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>


            </div>
        </div>






        @endsection