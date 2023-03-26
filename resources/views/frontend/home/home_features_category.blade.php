@php
     $categories = App\Models\Category::orderBy('category_name','ASC')->get();
@endphp

<section class="popular-categories section-padding">
    

    {{-- /////////////////////////////////// --}}
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3>Featured Categories</h3>

        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="rowm row product-grid-4">

                    @foreach ($categories as $category)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ url('product/category/'.$category->id.'/'.$category->category_slug) }}">
                                            <img class="default-img" src="{{asset($category->category_image)}} " alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                   
                                    <br>
                                    <br>
                                  
                                    <div class="product-card-bottom">
                                        
                                      
                                        
                                        <div class="add-cart addcart">
                                            <a class="add" href="{{ url('product/category/'.$category->id.'/'.$category->category_slug) }}">{{$category->category_name}} </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    @endforeach
                    
                    
                    <!--end product card-->
                </div>
                <!--End product-grid-4-->
            </div>
            <!--En tab one-->

          
            <!--En tab two-->
        </div>
        <!--End tab-content-->
    </div>
</section>