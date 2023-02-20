<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function UserDashboard(){

        $id = Auth::user()->id;
        $userData = User::find($id);

        return view('index',compact('userData'));
    }

    public function UserProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if($request ->file('photo')){
            $file = $request ->file('photo');
            @unlink(public_path('upload/user_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();


        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method

    public function UserDestroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    } // End Method

    public function UserUpdatePassword(Request $request){
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
