<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function AllBanner(){
        $banners = Banner::latest()->get();
        return view('backend.banner.banner_all',compact('banners'));
    }

    public function AddBanner(){
        return view('backend.banner.banner_add');
    }

    public function StoreBanner(Request $request){
        $image = $request->file('banner_image');
        $name_gen = hexdec(uniqid()). "." . $image->getClientOriginalExtension();
        $save_url = 'upload/banner/'.$name_gen ;
        $image->move(public_path('upload/banner'),$name_gen);

        Banner::insert([
            'banner_title' => $request->banner_title,
            'banner_url' => $request->banner_url,
            'banner_image' => $save_url,
        ]);

        $notification = array(
            'message' => 'banner Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.banner')->with($notification);

    }

    public function EditBanner($id){
        $banner = Banner::findOrFail($id);
        return view('backend.banner.banner_edit',compact('banner'));
    }

   public function UpdateBanner(Request $request) {
        $banner_id = $request->id;
        $old_img = $request->old_image;

        if($request->file('banner_image')){

            $image = $request->file('banner_image');
            $name_gen = hexdec(uniqid()). "." . $image->getClientOriginalExtension();
            $save_url = 'upload/banner/'.$name_gen ;
            $image->move(public_path('upload/banner'),$name_gen);
    
            if (file_exists($old_img)){
                unlink($old_img);
            }


            Banner::findOrFail($banner_id)->update([
                'banner_title' => $request->banner_title,
                'banner_url' => $request->banner_url,
                'banner_image' => $save_url,
            ]);
    
            $notification = array(
                'message' => 'banner Updated With Image Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.banner')->with($notification);


        }else {
            Banner::findOrFail($banner_id)->update([
                'banner_title' => $request->banner_title,
                'banner_url' => $request->banner_url,
            ]);
    
            $notification = array(
                'message' => 'banner Update Without Image Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.banner')->with($notification);

        }

   } 


    public function DeleteBanner($id){

        $banner =  Banner::findOrFail($id);
        $img = $banner->banner_image;

        unlink($img);
        $banner->delete();

        $notification = array(
            'message' => 'banner Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

}
