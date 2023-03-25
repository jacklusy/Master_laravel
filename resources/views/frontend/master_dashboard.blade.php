<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Easy Shop Online Store</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/assets/imgs/theme/favicon.svg')}} " />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/animate.min.css')}} " />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/main.css?v=5.3')}} " />

    {{-- notifications --}}
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />

</head>

<body>
 
    <!-- Quick view -->
    @include('frontend.body.quickview')

    <!-- Header  -->
    @include('frontend.body.header')
   
    <main class="main">
        @yield('main')
    </main>


    @include('frontend.body.footer')


    <!-- Preloader Start -->
    
    {{-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{asset('frontend/assets/imgs/theme/loading.gif')}} " alt="" />
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Vendor JS-->
    <script src="{{asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js')}} "></script>
    <script src="{{asset('frontend/assets/js/vendor/jquery-3.6.0.min.js')}} "></script>
    <script src="{{asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js')}} "></script>
    <script src="{{asset('frontend/assets/js/vendor/bootstrap.bundle.min.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/slick.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/jquery.syotimer.min.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/waypoints.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/wow.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/perfect-scrollbar.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/magnific-popup.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/select2.min.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/counterup.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/jquery.countdown.min.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/images-loaded.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/isotope.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/scrollup.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/jquery.vticker-min.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/jquery.theia.sticky.js')}} "></script>
    <script src="{{asset('frontend/assets/js/plugins/jquery.elevatezoom.js')}} "></script>
    <!-- Template  JS -->
    <script src="{{asset('frontend/assets/js/main.js?v=5.3')}} "></script>
    <script src="{{asset('frontend/assets/js/shop.js?v=5.3')}} "></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   
    {{--  start notifications --}}
      
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

	<script>
		@if(Session::has('message'))
		var type = "{{ Session::get('alert-type','info') }}"
		switch(type){
			case 'info':
			toastr.info(" {{ Session::get('message') }} ");
			break;

			case 'success':
			toastr.success(" {{ Session::get('message') }} ");
			break;

			case 'warning':
			toastr.warning(" {{ Session::get('message') }} ");
			break;

			case 'error':
			toastr.error(" {{ Session::get('message') }} ");
			break; 
		}
		@endif 
	</script>

    {{-- end notifications --}}



  <!--  ////////////// Start Apply Coupon ////////////// -->
    <script>
            
        function applyCoupon(){
            var total = $('#cart-total').val();
            var coupon_name = $('#coupon_name').val();
                    $.ajax({
                        type: "POST",
                        dataType: 'json',
                        data: {coupon_name:coupon_name},

                        url: "/coupon-apply/"+total,

                        success:function(data){
                            couponCalculation();

                            if (data.validity == true) {
                                $('#couponField').hide();
                            }
                        

                            // Start Message 

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        
                        showConfirmButton: false,
                        timer: 3000 
                    })
                    if ($.isEmptyObject(data.error)) {
                            
                            Toast.fire({
                            type: 'success',
                            icon: 'success', 
                            title: data.success, 
                            })

                    }else{
                    
                Toast.fire({
                            type: 'error',
                            icon: 'error', 
                            title: data.error, 
                            })
                        }

                    // End Message  


                        }
                    })
        }

        // Start CouponCalculation Method   
        function couponCalculation(){
            $.ajax({
                type: 'GET',
                url: "/coupon-calculation",
                dataType: 'json',
                success:function(data){
                if (data.total) {
                    $('#couponCalField').html(
                    `   <tr>
                            <td class="cart_total_label">
                                <h6 class="text-muted">Subtotal</h6>
                            </td>
                            <td class="cart_total_amount">
                                <h4 class="text-brand text-end">$${data.total}</h4>
                            </td>
                        </tr>
                    
                        <tr>
                            <td class="cart_total_label">
                                <h6 class="text-muted">Grand Total</h6>
                            </td>
                            <td class="cart_total_amount">
                                <h4 class="text-brand text-end">$${data.total}</h4>
                            </td>
                        </tr>
                    ` ) 
                }else{
                    $('#couponCalField').html(
                        `<tr>
                        <td class="cart_total_label">
                            <h6 class="text-muted">Subtotal</h6>
                        </td>
                        <td class="cart_total_amount">
                            <h4 class="text-brand text-end">$${data.subtotal}</h4>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="cart_total_label">
                            <h6 class="text-muted">Coupon </h6>
                        </td>
                        <td class="cart_total_amount">
                            <h6 class="text-brand text-end">${data.coupon_name} <a type="submit" onclick="couponRemove()"><i class="fi-rs-trash"></i> </a> </h6>
                        </td>
                    </tr>

                    <tr>
                        <td class="cart_total_label">
                            <h6 class="text-muted">Discount Amount  </h6>
                        </td>
                        <td class="cart_total_amount">
                            <h4 class="text-brand text-end">$${data.discount_amount}</h4>
                        </td>
                    </tr>


                    <tr>
                        <td class="cart_total_label">
                            <h6 class="text-muted">Grand Total </h6>
                        </td>
                        <td class="cart_total_amount">
                            <h4 class="text-brand text-end">$${data.total_amount}</h4>
                        </td>
                    </tr> `
                        ) 
                } 

                }
            })
        }  

        couponCalculation();

    </script>
<!--  ////////////// End Apply Coupon ////////////// -->

</body>

</html>