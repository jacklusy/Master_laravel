@extends('min_dashboard')

@section('UserDach')

    <div class="card">
        <div class="card-header">
            <h5>Account Details</h5>
        </div>
        <div class="card-body">
            
            <form method="POST" action="{{route('user.profile.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>User Name <span class="required">*</span></label>
                        <input class="form-control" name="username" type="text" value={{$userData->username}} >
                    </div>
                    <div class="form-group col-md-6">
                        <label> Name <span class="required">*</span></label>
                        <input class="form-control" name="name" type="text" value={{$userData->name}}>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Email  <span class="required">*</span></label>
                        <input class="form-control" name="email" type="email" value={{$userData->email}} >
                    </div>
                    <div class="form-group col-md-12">
                        <label>Phone <span class="required">*</span></label>
                        <input class="form-control" name="phone" type="phone" value={{$userData->phone}} >
                    </div>
                    <div class="form-group col-md-12">
                        <label>User Address <span class="required">*</span></label>
                        <input class="form-control" name="address" type="text" value={{$userData->address}} >
                    </div>
                    <div class="form-group col-md-12">
                        <label>User Photo <span class="required">*</span></label>
                        <input id="image" class="form-control" name="photo" type="file" />
                    </div>
                    <div class="form-group col-md-12 photo">
                        <img src="{{!empty($userData->photo)?url('upload/user_images/'.$userData->photo):url('upload/default.jpg')}}" alt="photo" class="showImage" id="showImage" style="width: 100px ; height:100px;">
                    </div>
                    
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection