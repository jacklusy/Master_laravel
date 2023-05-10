<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VendorController extends Controller
{

    public function index() {
        return view('vendor.index');
    }


    public function VendorDashboard() {
        return view('vendor.vendor_dashboard');
    }

    public function AllAdmin(Request $request)
    {
      
        $admins = User::where('role' , 'admin')->get();
        if (! $admins) {
            abort(404);
        }
        return $admins;

        
    }

    public function AdminStore(Request $request ){
        
        if ($request->admin_id != null) {

            $admins = User::find($request->admin_id);
            if (! $admins) {
                abort(404);
            }

            $admins->update([
                'username' => $request->input('username'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
            ]);
    
            return response()->json([
                'success' => 'User Updated Successfully'
            ],201);

        } else {
            
            $request->validate([
                'username' => 'required|min:2|max:30' ,
                'name' => 'required' ,
                'email' => 'required' ,
                'password' => 'required' ,
                'phone' => 'required' ,
                'address' => 'required' ,
                
            ]);
    
            User::insert([
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone,
                'address' => $request->address, 
                'role' => 'admin',

            ]);
    
            return response()->json([
                'success' => 'User Add Successfully'
            ],201);
        }
    


    }

    public function AdminEdit($id) {
        $admin = User::find($id);
        if (! $admin) {
            abort(404);
        }
        return $admin;
        
    }

    public function updateStatus(Request $request)
    {
        $model = User::find($request->id);
        $model->active = $request->active;
        $model->save();
        
        return response()->json(['success' => true]);
    }


}
