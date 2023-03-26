<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

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

  

    public function ProcessToDelivered($order_id){

        $product = Order_item::where('order_id',$order_id)->get();
        foreach($product as $item){
            Product::where('id',$item->product_id)
                    ->update(['product_qty' => DB::raw('product_qty-'.$item->qty) ]);
        } 

        Order::findOrFail($order_id)->update(['status' => 'deliverd']);

        $notification = array(
            'message' => 'Order Deliverd Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.delivered.order')->with($notification); 


    }// End Method 

    public function AdminInvoiceDownload($order_id){

        $order = Order::with('state','user')->where('id',$order_id)->first();
        $orderItem = Order_item::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        $pdf = Pdf::loadView('backend.orders.admin_order_invoice', compact('order','orderItem'))->setPaper('a4')->setOption([
                'tempDir' => public_path(),
                'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');

    }// End Method 


 // End Method // End Method 
}
