@extends('frontend.master_dashboard')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@section('main')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Cart
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h4 class="heading-2 mb-10">Your Cart</h4>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">There are products in your cart</h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive shopping-summery">
                    <table class="table table-wishlist">
                        <thead>
                            <tr class="main-heading">
                                <th class="custome-checkbox start pl-30">
                                   
                                </th>
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Color</th>
                                <th scope="col">Size</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col" class="end">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $AllTotal = 0;
                            @endphp
                            @foreach ($carts as $cart)
                                <tr class="pt-30">
                                    <td class="custome-checkbox pl-30">
                                    
                                    </td>
                                    <td class="image product-thumbnail pt-40">
                                        <img src="{{asset($cart['product']['product_thambnail'])}}" alt="#">
                                    </td>
                                    <td class="product-des product-name">
                                        <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="{{url('product/details/'.$cart['product']['id'].'/'.$cart['product']['product_slug'])}}">{{$cart['product']['product_name']}}</a></h6>
                                        
                                    </td>
                                    <td class="price" data-title="Price">
                                        @if ($cart['product']['discount_price'] == NULL)
                                            <h4 class="text-body">${{$cart['product']['selling_price']}}</h4>
                                            
                                        @else
                                            <h4 class="text-body">${{$cart['product']['discount_price']}}</h4>
                                        @endif
                                    </td>
                                    @if ($cart->color !== NULL)
                                        <td class="price" data-title="Price">
                                            <h6 class="text-body">{{$cart->color}}</h6>
                                        </td>
                                    @else
                                        <td class="price" data-title="Price">
                                            <h6 class="text-body">--</h6>
                                        </td>
                                    @endif
                                    
                                    @if ($cart->size !== NULL)
                                        <td class="price" data-title="Price">
                                            <h6 class="text-body">{{$cart->size}} </h6>
                                        </td>
                                    @else
                                        <td class="price" data-title="Price">
                                            <h6 class="text-body">--</h6>
                                        </td>
                                    @endif

                                    <td class="text-center detail-info" data-title="Stock">
                                        <div class="detail-extralink mr-15"style="text-align:start;">
                                            <div class="detail-qty border radius" style="width: 20px;">
                                                <h6 class="text-body">{{$cart->quantity}}</h6>
                                            </div>
                                        </div>
                                    </td>

                                    @php
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
                                    @endphp
                                    <td class="price" data-title="Price">
                                        <h4 class="text-brand">${{$total}} </h4>
                                    </td>
                                    <td class="action text-center" data-title="Remove"><a href="{{route('delete.cart',$cart->id)}}" class="text-body"><i class="fi-rs-trash"></i></a></td>
                                </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
               

                <div class="row mt-50">

                    <div class="col-lg-5">
                        @if (Session::has('coupon'))
                            
                        @else
                            
                            
                                <div class="p-40" id="couponField">
                                    <h4 class="mb-10">Apply Coupon</h4>
                                    <p class="mb-30"><span class="font-lg text-muted">Using A Promo Code?</p>
                                        
                                    <form action="#" id="coupon-form">
                                        <div class="d-flex justify-content-between">
                                            <input class="font-medium mr-15 coupon" id="coupon_name" placeholder="Enter Your Coupon">
                                            <a type="submit" onclick="applyCoupon()" class="btn btn-success"><i class="fi-rs-label mr-10"></i>Apply</a>
                                        </div>
                                    </form>
                                </div>
                            
                        @endif
                    </div>


                    <div class="col-lg-7">
                        <div class="divider-2 mb-30"></div>
                        <div class="border p-md-4 cart-totals ml-30">
                            <div class="table-responsive">
                                <table class="table no-border">
                                    <tbody>
                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">Subtotal</h6>
                                            </td>
                                            <td class="cart_total_amount">

                                                <input type="hidden" id="cart-total" value="{{$AllTotal}}">
                                                <h4 class="text-brand text-end">${{$AllTotal}}</h4>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">Coupon</h6>
                                            </td>
                                            
                                            <td class="cart_total_amount">
                                                <h6 class="text-brand text-end"></h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">Discount Amount</h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                <h4 class="text-brand text-end" id="coupon-discount"></h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">Grand Total</h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                <h4 class="text-brand text-end" id="GrandTotal"></h4>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ route('checkout',$AllTotal) }}" class="btn mb-20 w-100">Proceed To CheckOut<i class="fi-rs-sign-out ml-15"></i></a>
                        </div>
                    </div>
                
                </div>
            </div>
             
        </div>
    </div>

@endsection