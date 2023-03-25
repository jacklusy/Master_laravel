<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ShipState;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id) {

        if (Auth::check()) {
            $user = Auth::user();
        }

        $product = Product::findOrFail($id);

        Cart::insert([
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'color' => $request->color,
            'size' => $request->size,

            'user_id' => $user->id,
            'name' => $user->name,
            'phone' => $user->phone,
            'address' => $user->address,
        ]);

        $notification = array(
            'message' => 'Add to Cart Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('home')->with($notification);


        
    }

    
    public function DeleteCart($id){

        $Cart =  Cart::findOrFail($id);

        $Cart->delete();

        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function MyCart() {
        $user_id = Auth::user()->id;
        $carts = Cart::where('user_id',$user_id)->get();
        return view('frontend.mycart.view_mycart',compact('carts'));
    }

    
    public function CheckoutCreate($AllTotal){

        if(Auth::check()){

            if ($AllTotal > 0) {

                $user_id = Auth::user()->id;
                $carts = Cart::where('user_id',$user_id)->get();
                $states = ShipState::orderBy('state_name','ASC')->get();
                return view('frontend.checkout.checkout_view',compact('carts','AllTotal','states'));

            }else {

                $notification = array(
                    'message' => 'Shopping At List One Product',
                    'alert-type' => 'error'
                );
        
                return redirect()->to('/')->with($notification);
            }

        }else {
            $notification = array(
                'message' => 'You Need to Login First',
                'alert-type' => 'error'
            );
    
            return redirect()->route('login')->with($notification);
        }
    }

    
}
