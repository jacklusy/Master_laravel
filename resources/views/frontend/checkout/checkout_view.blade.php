@extends('frontend.master_dashboard')

@section('main')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Checkout
        </div>
    </div>
</div>
<div class="container mb-80 mt-50 containe">
    <div class="row">
        <div class="col-lg-8 mb-40">
            <h3 class="heading-2 mb-10">Checkout</h3>
            <div class="d-flex justify-content-between">
                <h6 class="text-body">There are products in your cart</h6>
            </div>
        </div>
    </div>

    <form method="post" action="{{route('stripe.order')}}">
        @csrf

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{session('status')}}
            </div>
            @elseif (session('error'))
            <div class="alert alert-danger" role="alert">
                {{session('error')}}
            </div>
            @endif
        <div class="row">
            <div class="col-lg-7">

                <div class="row">
                    <h4 class="mb-30">Billing Details</h4>


                    <div class="row">
                        <div class="form-group col-lg-6">
                            <input type="text"  name="shipping_name" placeholder="User Name" value="{{Auth::user()->name}}">
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="email"  name="shipping_email" placeholder="Email" value="{{Auth::user()->email}}">
                        </div>
                    </div>



                    <div class="row shipping_calculator">
                        <div class="form-group col-lg-6">
                            <input  type="text" name="shipping_phone" placeholder="Phone Number" value="{{Auth::user()->phone}}" >
                        </div>
                    
                        <div class="form-group col-lg-6">
                            <input  type="text" name="post_code" placeholder="Post Code">
                        </div>
                    </div>


                    <div class="row shipping_calculator">
                        <div class="form-group col-lg-6">
                            <div class="custom_select">
                                <select required="" name="state_id" class="form-control">
                                    <option>Select State...</option>
                                    @foreach($states as $item)
                                        <option value="{{ $item->id }}">{{ $item->state_name }}</option>
                                    @endforeach
            
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <input  type="text" name="shipping_address" placeholder="Address" value="{{Auth::user()->address}}" >
                        </div>
                    </div>

                    <div class="form-group mb-30">
                        <textarea rows="5" placeholder="Additional information" name="notes"></textarea>
                    </div>

                </div>
            </div>


            <div class="col-lg-5">
                <div class="border p-40 cart-totals ml-30 mb-50">
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Your Order</h4>
                        <h6 class="text-muted">Subtotal</h6>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="order_table checkout">
                        <table class="table tableProduct no-border">
                            <tbody>

                                @foreach ($carts as $cart)
                                    <tr>
                                        <td class="image product-thumbnail"><img src="{{asset($cart['product']['product_thambnail'])}}" alt="#">
                                        </td>
                                        <td>
                                            <h6 class="w-160 mb-5 long-paragraph"><a href="{{url('product/details/'.$cart['product']['id'].'/'.$cart['product']['product_slug'])}}"
                                                    class="text-heading ">{{$cart['product']['product_name']}}</a></h6></span>
                                            <div class="product-rate-cover">
                                                <h6 class="text-muted ">x {{$cart->quantity}}</h6>
                                                @if ($cart->color !== NULL)
                                                    <strong>{{$cart->color}}</strong>
                                                @else
                                                    <strong></strong>
                                                @endif
                                                @if ($cart->color && $cart->size)
                                                    <strong> /</strong>
                                                @endif
                                                @if ($cart->size !== NULL)
                                                    <strong> {{$cart->size}}</strong>
                                                @else
                                                    <strong></strong>
                                                @endif
                                            </div>
                                        </td>
                                       

                                        @if ($cart['product']['discount_price'] == NULL)
                                            <td>
                                                
                                                <h4 class="text-brand">{{$cart['product']['selling_price']}} JD </h4>
                                            </td>
                                        @else
                                            <td>
                                                <h4 class="text-brand">{{$cart['product']['discount_price']}} JD </h4>
                                            </td>
                                        @endif

                                    
                                    </tr>
                                @endforeach
                            
                            </tbody>
                        </table>

                        <table class="table no-border">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Grand Total</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">{{$AllTotal}} JD </h4>
                                        <input type="hidden" value="{{$AllTotal}}" name="amount">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <button type="submit" class="CheckOut btn mb-20 w-100">PLACE ORDER</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
               
            </div>
        </div>
    </form>

</div>

<script>
    var checkboxes = document.querySelectorAll('input[type="radio"]');

// Add an event listener to each checkbox
checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('click', function() {
        // Uncheck all other checkboxes
        checkboxes.forEach(function(otherCheckbox) {
            if (otherCheckbox !== checkbox) {
                otherCheckbox.checked = false;
            }
        });
    });
});
</script>

@endsection