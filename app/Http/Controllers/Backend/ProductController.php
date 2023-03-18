<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function AllProduct(){
        $Products = Product::latest()->get();
        return view('backend.product.product_all',compact('Products'));
    }

    
    public function AddProduct(){
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.product.product_add',compact('brands','categories'));
    }

    public function StoreProduct(Request $request){
        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()). "." . $image->getClientOriginalExtension();
        $save_url = 'upload/products/thambnail/'.$name_gen ;
        $image->move(public_path('upload/products/thambnail/'),$name_gen);

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),

            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_thambnail' =>$save_url,
            'status' => 1,
            'created_at' =>Carbon::now(),

        ]);

        // Multiple Image Upload Form Her

        $images = $request->file('multi_img');
        
        foreach($images as $img) {
            $make_name = hexdec(uniqid()). "." . $img->getClientOriginalExtension();
            $img->move(public_path('upload/products/multi-img/'),$make_name);
            $uploadPath = 'upload/products/multi-img/'.$make_name ;

            MultiImg::insert([
                'product_id' =>$product_id,
                'photo_name' => $uploadPath,
                'created_at' =>Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.product')->with($notification);

    }

    public function EditProduct($id){
        $multiImage = MultiImg::where('product_id',$id)->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.product_edit',compact('products','brands','categories','multiImage'));
    }


    public function UpdateProduct(Request $request) {
        $product_id = $request->id ;

        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),

            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'status' => 1,
            'created_at' =>Carbon::now(),

        ]);

       
        $notification = array(
            'message' => 'product Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.product')->with($notification);


    } 

    public function UpdateProductThambnail(Request $request) {
        $pro_id = $request->id;
        $oldImage = $request->old_img;

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()). "." . $image->getClientOriginalExtension();
        $save_url = 'upload/products/thambnail/'.$name_gen ;
        $image->move(public_path('upload/products/thambnail/'),$name_gen);

        
        if (file_exists($oldImage)){
            unlink($oldImage);
        }

        Product::findOrFail($pro_id)->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'product Updated Image Thambnail Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.product')->with($notification);
    }

    public function UpdateProductMultiImage(Request $request) {
            $imgs = $request->multi_img;

            foreach ($imgs as $id => $img) {
                $imgDel = MultiImg::findOrFail($id);
                unlink($imgDel->photo_name);

                $make_name = hexdec(uniqid()). "." . $img->getClientOriginalExtension();
                $img->move(public_path('upload/products/multi-img/'),$make_name);
                $uploadPath = 'upload/products/multi-img/'.$make_name ;
    
                MultiImg::where('id',$id)->update([
                    'photo_name' => $uploadPath,
                    'updated_at' =>Carbon::now(),
                ]);
            }// end foreach


            $notification = array(
                'message' => 'product Updated Multi Image Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification); 
    }

    public function MultiImageDelete($id) {
        $oldImg =  MultiImg::findOrFail($id);
        $img = $oldImg->photo_name;
        unlink($img);

        $oldImg->delete();

        $notification = array(
            'message' => 'Product Deleted Multi Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ProductInactive($id) {
        Product::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Product Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ProductActive($id) {
        Product::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Product Active',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteProduct($id) {
        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);
        $product->delete();

        $images = MultiImg::where('product_id',$id)->get();
        foreach($images as $img){
            unlink($img->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
