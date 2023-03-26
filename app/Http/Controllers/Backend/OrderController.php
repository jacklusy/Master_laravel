<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_item;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function PendingOrder() {
        $orders = Order::where('status','pending')->orderBy('id','DESC')->get();
        return view('backend.orders.pending_orders',compact('orders'));
    }

    public  function AdminOrderDetails($order_id) {
        
        $order = Order::with('state','user')->where('id',$order_id)->first();
        $orderItem = Order_item::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        return view('backend.orders.admin_order_details',compact('order','orderItem'));

    }

    public function AdminDeliveredOrder(){
        $orders = Order::where('status','deliverd')->orderBy('id','DESC')->get();
        return view('backend.orders.delivered_orders',compact('orders'));
    } // End Method 

    public function ConfirmToProcess($order_id){
        Order::findOrFail($order_id)->update(['status' => 'processing']);

        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.delivered.order')->with($notification); 


    }// End Method 

}
