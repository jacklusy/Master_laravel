<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\ShipDistricts;
use App\Models\ShipState;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function CheckoutStore(Request $request) {
        
        Checkout::insert([
            'shipping_name' => $request->shipping_name,
            'shipping_email' => $request->shipping_email,
            'shipping_phone' => $request->shipping_phone,
            'post_code' => $request->post_code,
            'state_name' => $request->state_name,
            'shipping_address' => $request->shipping_address,
            'notes' => $request->notes,

            'stripe' => $request->stripe,
            'cash' => $request->cash,
            'card' => $request->card,
        ]);

        if( $request->stripe == 1 ) {

            return view('frontend.payment.strip');

        }elseif($request->cash == 1) {

            return view('frontend.payment.cash');

        } else {
            
            return 'card page';

        }


    }
}
