<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShipState;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShippingAreaController extends Controller
{

    ////////////////////// State /////////////////

    public function AllState(){
        $state = ShipState::latest()->get();
        return view('backend.ship.state.state_all',compact('state'));
    }


    public function AddState() {
        return view('backend.ship.state.state_add');

    }
   
    public function StoreState(Request $request){
   
        ShipState::insert([
            'state_name' => $request->state_name,
        ]);

        $notification = array(
            'message' => 'Shipstate Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.state')->with($notification);

    }

   

    public function EditState($id){
        $state = ShipState::findOrFail($id);
        return view('backend.ship.state.state_edit',compact('state'));
    }


    public function UpdateState(Request $request) {

        $state_id =  $request->id;

        ShipState::findOrFail($state_id)->update([
            'state_name' => $request->state_name,
        ]);

        $notification = array(
            'message' => 'ShipState Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.state')->with($notification);
     
    } 



    public function DeleteState($id){

        $state =  ShipState::findOrFail($id);
       
        $state->delete();

        $notification = array(
            'message' => 'ShipState Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }



}
