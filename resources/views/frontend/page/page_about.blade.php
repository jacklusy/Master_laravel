@extends('frontend.master_dashboard')

@section('main')
<div class="page-header breadcrumb-wrap ">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> About
        </div>
    </div>
</div>

<section id="about" class="section-bg" style="padding: 25px 50px">
    <div class="container" data-aos="fade-up">

        <div class="row mb-100">

            <div class="col-lg-6  d-lg-flex">
                <div class="banner-img mb-sm-0 wow animate__ animate__fadeInUp animated" data-wow-delay=".4s"
                    style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                    <img src="{{ asset('frontend/assets/imgs/page/about.jpg ') }}" alt="">
                    <div class="banner-text">
                        <h4></h4>
                        <h4></h4>
                        
                    </div>
                </div>
            </div>
           
            <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up"
                data-aos-delay="100">
                <h4>Our Fashion Philosophy</h4>
                <br>
                <div>
                    <p>
                        At 3dimen, we believe that fashion should be personal and accessible to everyone. That's why we
                        offer the latest styles of clothing, shoes, and accessories at affordable prices. Our mission is to
                        empower people to express themselves through fashion and make a positive impact on the world.

                    </p>
                </div>
                <br>
                <div>
                    <p>
                        We are passionate about providing our customers with a seamless shopping experience. From
                        browsing our website to receiving your order, we strive to make every step of the process easy
                        and enjoyable. Our customer service team is available 24/7 to answer any questions and ensure
                        that you are completely satisfied with your purchase.

                    </p>
                    <br>
                    <br>
                    <a href="{{route('user.shop.page')}}" class="CheckOut btn mb-20">Shop Now</a>
                </div>
                

            </div>
        </div>

        <div class="row">

            <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up"
                data-aos-delay="100">
                <h4>Thank You for Choosing 3dimen as Your Fashion Destination</h4>
                <br>
                
                <div>
                    <p>At 3dimen, we are committed to sustainability and ethical practices. We believe that fashion
                        should not come at the cost of the environment or the people who make our clothes. That's why we
                        work with suppliers who share our values and prioritize responsible sourcing and production
                        methods.
                    </p>
                </div>
                <br>

                <div>
                    <p>Thank you for choosing 3dimen as your go-to destination for fashion. We are constantly updating
                        our collections to bring you the latest trends and styles, so be sure to check back often. We
                        can't wait to see how you express yourself through our clothes!
                    </p>
                    <br>
                    <br>
                    <a href="{{route('user.contact.page')}}" class="CheckOut btn mb-20">Contact US</a>
                </div>

            </div>

            <div class="col-lg-6  d-lg-flex">
                <div class="banner-img mb-sm-0 wow animate__ animate__fadeInUp animated" data-wow-delay=".4s"
                    style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                    <img src="{{ asset('frontend/assets/imgs/page/about2.jpg ') }}" alt="">
                    <div class="banner-text">
                        <h4></h4>
                        <h4></h4>
                       
                    </div>
                </div>
            </div>
        </div>

    </div>
</section><!-- End About Section -->
@endsection