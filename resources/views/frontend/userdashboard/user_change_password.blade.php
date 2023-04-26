@extends('min_dashboard')

@section('UserDach')
<div class="card">
    <div class="card-header">
        <h5>Change Password</h5>
    </div>
    <div class="card-body">
        
        <form method="post" action="{{route('user.update.password')}}">
            @csrf

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{session('status')}}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{session('error')}}
                </div>
            @endif

            <div class="row">
                
                <div class="form-group col-md-12">
                    <label class="form-control-label">Old Password</label>
                    <input type="password" name="old_password" id="current_password"  placeholder="***********" class="form-control padding form-control-alternative @error('old_password') is-invalid @enderror ">
                    @error('old_password')
                    <span class="text-danger">{{ $message }}</span> 
                    @enderror
                </div>
                <div class="form-group col-md-12">
                    <label class="form-control-label">New Password</label>
                    <input type="password" name="new_password" id="new_password"  placeholder="***********" class="form-control padding form-control-alternative @error('new_password') is-invalid @enderror ">
                    @error('new_password')
                    <span class="text-danger">{{ $message }}</span> 
                    @enderror
                </div>
                <div class="form-group col-md-12">
                    <label class="form-control-label">Confirm New Password</label>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" placeholder="***********" class="form-control padding form-control-alternative">
                </div>
                
                <div class="col-md-12">
                    <button type="submit" class="CheckOut btn ">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection