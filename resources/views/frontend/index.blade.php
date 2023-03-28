@extends('frontend.master_dashboard')

@section('main')
    
@include('frontend.home.home_slider')
<!--End hero slider-->

@include('frontend.home.home_features_category')
<!--End category slider-->

@include('frontend.home.home_banner')
<!--End banners-->


@include('frontend.home.home_features_product')
<!--End Best Sales-->


@include('frontend.home.home_new_product')
<!--Products Tabs-->

<br>
{{-- <section class="section-padding mb-30">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                <h4 class="section-title style-1 mb-30 animated animated"> Hot Deals </h4>
                <div class="product-list-small animated animated">
                   

                    @foreach ($HotDeals as $product)
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}"><img src="{{asset($product->product_thambnail)}} " alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}}</a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>

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
                        </article>
                    @endforeach
                   
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                <h4 class="section-title style-1 mb-30 animated animated">  Special Offer </h4>
                <div class="product-list-small animated animated">
              
                    @foreach ($SpecialOffer as $product)
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}"><img src="{{asset($product->product_thambnail)}} " alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}}</a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>

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
                        </article>
                    @endforeach
                   
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                <div class="product-list-small animated animated">
                   

                    @foreach ($new as $product)
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}"><img src="{{asset($product->product_thambnail)}} " alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}}</a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>

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
                        </article>
                    @endforeach
                   
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                <h4 class="section-title style-1 mb-30 animated animated"> Special Deals </h4>
                <div class="product-list-small animated animated">
                   

                    @foreach ($SpecialDeals as $product)
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}"><img src="{{asset($product->product_thambnail)}} " alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}}</a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>

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
                        </article>
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!--End 4 columns-->

{{-- @include('frontend.home.home_vendor_list') --}}
<!--End Vendor List -->


@endsection