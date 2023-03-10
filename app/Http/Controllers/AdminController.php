<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard() {
        return view('admin.index');
    } // End Method

    public function AdminLogin() {
        return view('admin.admin_login');
    } // End Method

    public function AdminDestroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    } // End Method

    public function AdminProfile() {
        $id = Auth::user()->id;
        $adminData = User::find($id);

        return view('admin.admin_profile_view',compact('adminData'));
    } // End Method

    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if($request ->file('photo')){
            $file = $request ->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();


        $notification = array(
            'message' => 'Vendor Active Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method


    public function AdminChangePassword(){
        return view('admin/change_password');
    }

    public function AdminUpdatePassword(Request $request){
       // validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]); 
       // Match The Old Password
        if(!Hash::check($request->old_password, auth::user()->password)){
            return back()->with("error" , "Password Doesn't Match !!");
        }

        // update new password

        User::Where('id',auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status","Password Changed Successfully");
    } // End Method 


   

}
