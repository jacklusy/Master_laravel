@php
    $featured = App\Models\Product::where('featured',1)->where('discount_price' , "!=" , NULL)->orderBy('id','DESC')->limit(7)->get();
@endphp

<section class="section-padding pb-5">
    <div class="container">
        <div class="section-title wow animate__animated animate__fadeIn">
            <h3 class=""> Featured Products </h3>
             
        </div>
        <div class="row">
            <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                <div class="banner-img style-2">
                    <div class="banner-text">
                        <a href="shop-grid-right.html" class="btn " style="background-color: #fff !important; color: #BE7741 !important; ">Learn More<i class="fi-rs-arrow-small-right" style="color: #BE7741 !important; font-size:15px;"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                <div class="tab-content" id="myTabContent-1">
                    <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                        <div class="carausel-4-columns-cover arrow-center position-relative">
                            <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                            <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">

                                @foreach ($featured as $product)
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                                    <img class="default-img" src="{{asset($product->product_thambnail)}} " alt="" />
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
                                            <h2>
                                                <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                                    {{ $product->product_name }}
                                                </a>
                                            </h2>
                                            <br>

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
                                @endforeach
                                <!--End product Wrap-->

                            </div>
                        </div>
                    </div>
                    <!--End tab-pane-->

                   
                </div>
                <!--End tab-content-->
            </div>
            <!--End Col-lg-9-->
        </div>
    </div>
</section>