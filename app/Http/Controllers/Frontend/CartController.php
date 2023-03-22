<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id) {

        $user = Auth()->user();
        $product = Product::findOrFail($id);
        $cart = new Cart;
        if ($product->discount_price == NULL) {

            $cart->name= $user->name;
            $cart->phone= $user->phone;
            $cart->address= $user->address;

            $cart->product_name = $product->product_name;
            $cart->selling_price = $product->selling_price;
            $cart->product_qty = $product->product_qty;

            $cart->save();
            return redirect()->back();

        }else {
            $cart=([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' =>1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ]
            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart' ]);
        }

        
    }


}
