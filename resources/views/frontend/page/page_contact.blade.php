@extends('frontend.master_dashboard')

@section('main')

    <div class="page-header breadcrumb-wrap ">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Contact
            </div>
        </div>
    </div>
    <div class="page-content pt-50">
       
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <section class="mb-50">
                        
                        <div class="row" style="justify-content: center;">
                            <div class="col-xl-8">
                                <div class="contact-from-area padding-20-row-col">
                                    <h2 class="mb-10">Stay Connected</h2>
                                    <h5 class="text-brand mb-10">WE'D LOVE TO HEAR FROM YOU</h5>
                                    <br>
                                    <form class="contact-form-style mt-30" id="contact-form" method="POST" action="{{route('store.contact')}}">
                                        @csrf

                                        <div class="row">
                                            @if (Auth()->check())
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="input-style mb-20">
                                                        <input name="name" placeholder="First Name" value="{{$user->name}}" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="input-style mb-20">
                                                        <input name="email" placeholder="Your Email" value="{{$user->email}}" type="email" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="input-style mb-20">
                                                        <input name="phone" placeholder="Your Phone" value="{{$user->phone}}" type="tel" />
                                                    </div>
                                                </div>
                                                
                                            @else
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="input-style mb-20">
                                                        <input name="name" placeholder="First Name" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="input-style mb-20">
                                                        <input name="email" placeholder="Your Email"  type="email" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="input-style mb-20">
                                                        <input name="phone" placeholder="Your Phone"  type="tel" />
                                                    </div>
                                                </div>
                                            @endif


                                            <div class="col-lg-6 col-md-6">
                                                <div class="input-style mb-20">
                                                    <input name="subject" placeholder="Subject" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="textarea-style mb-30">
                                                    <textarea name="message" placeholder="Message"></textarea>
                                                </div>
                                                <button class="CheckOut btn mb-20" type="submit">Send message</button>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- <p class="form-messege"></p> --}}
                                </div>
                            </div>
                            
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection