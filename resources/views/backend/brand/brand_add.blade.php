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
                            <form method="POST" action="{{route('admin.profile.store')}}" enctype="multipart/form-data">
                                @csrf
                                
                                <h4>Add Brand</h4>
                                <hr class="my-4">
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-username">Brand Name</label>
                                                <input type="text" id="input-username" name="brand_name" class="form-control padding form-control-alternative" placeholder="Username">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Address -->
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Brand Image</label>
                                                <input type="file" id="image" name="brand_image" class="form-control padding form-control-alternative">
                                            </div>
                                            <div class="form-group">
                                                <img src="{{url('upload/default.jpg')}}" alt="photo" class="showImage" id="showImage">
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