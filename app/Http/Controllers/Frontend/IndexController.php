<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\MultiImg;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function Index() {
        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->limit(5)->get();

        $skip_category_2 = Category::skip(2)->first();
        $skip_product_2 = Product::where('status',1)->where('category_id',$skip_category_2->id)->orderBy('id','DESC')->limit(5)->get();
        
        $skip_category_7 = Category::skip(2)->first();
        $skip_product_7 = Product::where('status',1)->where('category_id',$skip_category_7->id)->orderBy('id','DESC')->limit(5)->get();

        $HotDeals = Product::where('hot_deals',1)->where('discount_price','!=',Null)->orderBy('id','DESC')->limit(3)->get();
        $SpecialOffer = Product::where('special_offer',1)->orderBy('id','DESC')->limit(3)->get();

        $new = Product::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $SpecialDeals = Product::where('special_deals',1)->orderBy('id','DESC')->limit(3)->get();
        
        return view('frontend.index',compact('skip_category_0','skip_product_0','skip_category_2','skip_product_2','skip_category_7','skip_product_7','HotDeals','SpecialOffer','SpecialDeals','new'));

    }


    public function ProductDetails($id,$slug){
        $product = Product::findOrFail($id);

        $color = $product->product_color;
        $product_color = explode(',', $color);

        $size = $product->product_size;
        $product_size = explode(',', $size);

        $multiImg = MultiImg::where('product_id',$id)->get();

        // $cat_id = $product->category_id;
        // $relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->limit(4)->get();
        $relatedProduct = Product::where('id','!=',$id)->orderBy('id','DESC')->limit(12)->get();
        return view('frontend.product.product_details',compact('product','product_color','product_size','multiImg','relatedProduct'));
    }

    public function CatWiseProduct(Request $request, $id, $slug) {
        $products = Product::where('status',1)->where('category_id',$id)->orderBy('id','DESC')->get();
        $categories = Category::orderBy('category_name','ASC')->get();
        $breadcat = Category::where('id',$id)->first();
        $newProduct = Product::orderBy('id','DESC')->limit(3)->get();

        return view('frontend.product.category_view',compact('products','categories','breadcat','newProduct'));
    }

    public function ProductViewAjax($id) {
        $product = Product::with('category','Brand')->findOrFail($id);

        $color = $product->product_color;
        $product_color = explode(',', $color);

        $size = $product->product_size;
        $product_size = explode(',', $size);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ));

    }
    public function ShopPage() {
        $products = Product::where('status',1)->orderBy('id','DESC')->get();
        $categories = Category::orderBy('category_name','ASC')->get();
        $breadcat = Category::first();
        $newProduct = Product::orderBy('id','DESC')->limit(3)->get();

        return view('frontend.page.page_shop',compact('products','categories','breadcat','newProduct'));

    }
    public function ContactPage() {
        $user = Auth::user();
        return view('frontend.page.page_contact',compact('user'));

    }

    public function StoreContact(Request $request) {
        if (Auth::id()) {
            Contact::insert([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
                'created_at' =>Carbon::now(),
    
            ]);
        } else {
            Contact::insert([
                'user_id' => 1,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
                'created_at' =>Carbon::now(),
    
            ]);

        }

        $notification = array(
            'message' => 'Thank you for message',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    
    }

    public function ProductSearch(Request $request){

        $request->validate(['search' => "required"]);

        $item = $request->search;
        $categories = Category::orderBy('category_name','ASC')->get();
        $products = Product::where('product_name','LIKE',"%$item%")->get();
        $newProduct = Product::orderBy('id','DESC')->limit(3)->get();
        return view('frontend.product.search',compact('products','item','categories','newProduct'));

    }// End Method 
}
