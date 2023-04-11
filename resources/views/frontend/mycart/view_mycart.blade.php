@extends('frontend.master_dashboard')
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
                <div class="table-responsive shopping-summery container containe">
                    <table class="table table-wishlist">
                        <thead>
                            <tr class="main-heading">
                                
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Price</th>
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
                                    
                                    <td class="image product-thumbnail pt-40">
                                        <img src="{{asset($cart['product']['product_thambnail'])}}" alt="#">
                                    </td>
                                    <td class="product-des product-name">
                                        <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="{{url('product/details/'.$cart['product']['id'].'/'.$cart['product']['product_slug'])}}">{{$cart['product']['product_name']}}</a></h6>
                                        <div>
                                            @if ($cart->color !== NULL)
                                                <span class="text-body">{{$cart->color}}</span>
                                            @else
                                               
                                            @endif
                                            
                                            @if ($cart->size !== NULL)
                                                <span class="text-body">/ {{$cart->size}} </span>
                                            @else

                                            @endif
                                        </div>
                                    </td>
                                    <td class="price" data-title="Price">
                                        @if ($cart['product']['discount_price'] == NULL)
                                            <h6 class="text-body">${{$cart['product']['selling_price']}}</h6>
                                            
                                        @else
                                            <h6 class="text-body">${{$cart['product']['discount_price']}}</h6>
                                        @endif
                                    </td>
                                   

                                    <td class="text-center detail-info" data-title="Stock">
                                        <h6 class="text-body">{{$cart->quantity}}</h6>
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
                                        <h6 class="text-body" >${{$total}}.00 </h6>
                                    </td>
                                    
                                    <td class="action text-center" data-title="Remove">
                                        <a href="{{route('delete.cart',$cart->id)}}" class="text-body"><i class="fi-rs-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                    <div class="col-lg-4">
                        <div class="border p-md-4 cart-totals ml-30">
                            <div class="">
                                       
                                <div class="text-muted">Order Summary</div>
                                <div class="text-body text-end" id="GrandTotal">
                                    <div style="font-size: 12px;">Total</div>
                                    <div>${{$AllTotal}}</div>
                                    
                                </div>
                                        
                            </div>
                            <br>
                            <a href="{{ route('checkout',$AllTotal) }}" class="CheckOut btn mb-20 w-100">CheckOut Now</a>
                        </div>
                    </div>
                </div>
               

                
            </div>
             
        </div>
    </div>

@endsection