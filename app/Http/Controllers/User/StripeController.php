<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function StripeOrder(Request $request){
        $user_id = Auth::user()->id;
        
        if(empty($request->state_id)){
            return back()->with("error" , "State Doesn't Exist !!");
        }elseif(empty($request->shipping_name)){
            return back()->with("error" , "Shipping Name Doesn't Exist !!");

        }elseif(empty($request->shipping_email)){
            return back()->with("error" , "Shipping Eemail Doesn't Exist !!");

        }elseif(empty($request->shipping_phone)){
            return back()->with("error" , "Shipping Phone Doesn't Exist !!");

        }elseif(empty($request->shipping_address)){
            return back()->with("error" , "Shipping Address Doesn't Exist !!");

        }elseif(empty($request->post_code)){
            return back()->with("error" , "Post Code Doesn't Exist !!");

        }

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'state_id' => $request->state_id,
            'name' => $request->shipping_name,
            'email' => $request->shipping_email,
            'phone' => $request->shipping_phone,
            'adress' => $request->shipping_address,
            'post_code' => $request->post_code,
            'notes' => $request->notes,

            'amount' => $request->amount,
            
            'order_number' => 1,

            'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'), 
            'status' => 'pending',
            'created_at' => Carbon::now(),  

        ]);

        $carts = Cart::where('user_id',$user_id)->get();
        foreach($carts as $cart){

            Order_item::insert([
                'order_id' => $order_id,
                'product_id' => $cart->product_id,
                'color' => $cart->color,
                'size' => $cart->size,
                'qty' => $cart->quantity,
                'price' => $request->amount,
                'created_at' =>Carbon::now(),

            ]);

        } // End Foreach
       
        $CartDelete = Cart::where('user_id', $user_id)->delete();
        if ( $CartDelete) {

            $notification = array(
                'message' => 'Your Order Place Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('user.order.page')->with($notification); 
        } else {
            return "noo";
        }
        



    }

    
}
