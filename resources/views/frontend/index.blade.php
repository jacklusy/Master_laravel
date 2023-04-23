@extends('frontend.master_dashboard')

@section('main')
    
    @include('frontend.home.home_slider')
    <!--End hero slider-->

    @include('frontend.home.home_features_category')
    <!--End category slider-->

    {{-- @include('frontend.home.home_banner') --}}
    <!--End banners-->


    @include('frontend.home.home_features_product')
    <!--End Best Sales-->


    @include('frontend.home.home_new_product')
    <!--Products Tabs-->


@endsection