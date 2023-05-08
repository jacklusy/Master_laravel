@php
    $sliders = App\Models\Slider::orderBy('slider_title','ASC')->get();
@endphp

<section class="home-slider position-relative mb-110">
    <div class="container">
        <div class="home-slide-cover mt-30">
            <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">

                @foreach ($sliders as $slider)
                    <div class="single-hero-slider single-animation-wrap" style="background-image: url({{asset($slider->slider_image)}}">
                        
                    </div>
                @endforeach

            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </div>
    </div>
</section>