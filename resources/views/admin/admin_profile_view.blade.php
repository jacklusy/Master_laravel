<link rel="stylesheet" href="{{URL::asset('adminbackend\css\user_profile.css')}}">
@extends('admin.admin_dashboard')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid mt--7">
            <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                    <div class="card-profile-image">
                        <a href="#">
                        <img src="{{!empty($adminData->photo)? url('upload/admin_images/'.$adminData->photo):url('upload/default.jpg')}}" class="rounded-circle">
                        </a>
                    </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                    </div>
                </div>
                <div class="card-body pt-0 pt-md-4">
                    <pre>        

                    </pre>
                    <div class="text-center">
                    <h3>
                        {{-- {{session('user')->name}} --}}
                        {{-- <span class="font-weight-light">, 19</span> --}}
                    </h3>
                    <div class="h5 font-weight-300">
                        <i class="ni location_pin mr-2"></i><h3>{{$adminData->username}}</h3>
                    </div>
                    <div class="h5 mt-4">
                        <i class="ni business_briefcase-24 mr-2"></i>{{$adminData->email}}
                    </div>
                    
                    </div>
                </div>
                </div>
            </div>
                <div class="col-xl-8 order-xl-1">


                    <div id="edit">
                        <div class="card-body">
                            <form method="POST" action="{{route('admin.profile.store')}}" enctype="multipart/form-data">
                                @csrf
                                
                                <h4>Admin Profile</h4>
                                <hr class="my-4">
                                <h6 class="heading-small text-muted mb-4">User information</h6>
                                <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-username">Name</label>
                                        <input type="text" id="input-username" name="name" class="form-control padding form-control-alternative" value="{{$adminData->name}}" placeholder="Username">
                                    </div>
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Email address</label>
                                        <input type="email" id="input-email" name="email" class="form-control padding form-control-alternative" value="{{$adminData->email}}" placeholder="jesse@example.com">
                                    </div>
                                    </div>
                                </div>
                                
                                </div>
                                <hr class="my-4">
                                <!-- Address -->
                                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                                <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-address">Address</label>
                                        <input id="input-address" name="address" class="form-control padding form-control-alternative" placeholder="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" value="{{$adminData->address}}" type="text">
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Photo</label>
                                            <input type="file" id="image" name="photo" class="form-control padding form-control-alternative">
                                        </div>
                                        <div class="form-group">
                                            <img src="{{!empty($adminData->photo)?url('upload/admin_images/'.$adminData->photo):url('upload/default.jpg')}}" alt="photo" class="showImage" id="showImage">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-username">Phone Number</label>
                                            <input type="text" id="input-username" name="phone" class="form-control padding form-control-alternative" value="{{$adminData->phone}}" placeholder="Username" value="lucky.jesse">
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