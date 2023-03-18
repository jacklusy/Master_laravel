<link rel="stylesheet" href="{{URL::asset('adminbackend\css\user_profile.css')}}">
@extends('admin.admin_dashboard')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid mt--7">
            <div class="row">
            
                <div class="col-xl-12 order-xl-1">


                    <div id="edit">
                        <div class="card-body">
                            <form id="myForm" method="POST" action="{{route('update.slider')}}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $slider->id }}">
                                <input type="hidden" name="old_image" value="{{ $slider->slider_image }}">
                                
                                <h4>Edit slider</h4>
                                <hr class="my-4">
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-username">Slider Title</label>
                                                <input type="text" id="input-username" name="slider_title" class="form-control padding form-control-alternative" placeholder="Username" value="{{$slider->slider_title}}">
                                            </div>
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-username">Short Title</label>
                                                <input type="text" id="input-username" name="short_title" class="form-control padding form-control-alternative" placeholder="Username" value="{{$slider->short_title}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Address -->
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">slider Image</label>
                                                <input type="file" id="image" name="slider_image"  class="form-control padding form-control-alternative">
                                            </div>
                                            <div class="form-group">
                                                <img src="{{asset($slider->slider_image)}}" alt="photo" class="showImage" id="showImage">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group focused">
                                            <button type="submit" class="btn btn-sm btn-primary">submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </div>    
    </div>   



    

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                slider_name: {
                    required : true,
                }, 
            },
            messages :{
                slider_name: {
                    required : 'Please Enter slider Name',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>



<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>


@endsection