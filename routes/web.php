<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::get('/',[IndexController::class,'Index']);

Route::middleware(['auth'])->group(function(){

    Route::get('/dashboard',[UserController::class,'UserDashboard'])->
    name('dashboard');

    Route::post('/user/profile/store',[UserController::class,'UserProfileStore'])->
    name('user.profile.store');

    Route::get('/user/logout',[UserController::class,'UserDestroy'])->
    name('user.logout');

    Route::post('/user/update/password',[UserController::class,'UserUpdatePassword'])->
    name('user.update.password');

}); // Group Middleware End


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function(){

    Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->
    name('adminDash');

    Route::get('/admin/logout',[AdminController::class,'AdminDestroy'])->
    name('admin.logout');

    Route::get('/admin/profile',[AdminController::class,'AdminProfile'])->
    name('admin.profile');

    
    Route::post('/admin/profile/store',[AdminController::class,'AdminProfileStore'])->
    name('admin.profile.store');

    Route::get('/admin/change/password',[AdminController::class,'AdminChangePassword'])->
    name('admin.change.password');  

      
    Route::post('/admin/update/password',[AdminController::class,'AdminUpdatePassword'])->
    name('update.password');

   

});

Route::middleware('auth','role:vendor')->group(function(){

    Route::get('/vendor/dashboard',[VendorController::class,'VendorDashboard'])->
    name('vendorDash');
});
Route::get('/admin/login',[AdminController::class,'AdminLogin'])->middleware(RedirectIfAuthenticated::class);





Route::middleware(['auth','role:admin'])->group(function(){
    
    /////////// Brand ///////////

    Route::controller(BrandController::class)->group(function(){
    
        Route::get('/all/brand','AllBrand')->name('all.brand');
        Route::get('/add/brand','AddBrand')->name('add.brand');
        Route::post('/store/brand','StoreBrand')->name('store.brand');

        Route::get('/edit/brand/{id}','EditBrand')->name('edit.brand');
        Route::post('/update/brand','UpdateBrand')->name('update.brand');

        Route::get('/delete/brand/{id}','DeleteBrand')->name('delete.brand');
        
    });



    /////////// Category ///////////

    Route::controller(CategoryController::class)->group(function(){
    
        Route::get('/all/category','AllCategory')->name('all.category');

        Route::get('/add/category','AddCategory')->name('add.category');
        Route::post('/store/category','StoreCategory')->name('store.category');

        Route::get('/edit/category/{id}','EditCategory')->name('edit.category');
        Route::post('/update/category','UpdateCategory')->name('update.category');

        Route::get('/delete/category/{id}','DeleteCategory')->name('delete.category');
        
    });


    

    /////////// Product ///////////

    Route::controller(ProductController::class)->group(function(){
    
        Route::get('/all/product','AllProduct')->name('all.product');
        Route::get('/add/product','AddProduct')->name('add.product');
       
        Route::post('/store/product','StoreProduct')->name('store.product');

        Route::get('/edit/product/{id}','EditProduct')->name('edit.product');

        Route::post('/update/product','UpdateProduct')->name('update.product');
        Route::post('/update/product/thambnail','UpdateProductThambnail')->name('update.product.thambnail');
        Route::post('/update/product/multiImage','UpdateProductMultiImage')->name('update.product.multiImage');

        Route::get('/product/multiImage/delete/{id}','MultiImageDelete')->name('product.multiImg.delete');
        Route::get('product/inactive/{id}','ProductInactive')->name('product.inactive');
        Route::get('product/active/{id}','ProductActive')->name('product.active');

        Route::get('delete/product/{id}','DeleteProduct')->name('delete.product');
        
    });

    
    /////////// Slider ///////////

    Route::controller(SliderController::class)->group(function(){
    
        Route::get('/all/slider','AllSlider')->name('all.slider');

        Route::get('/add/slider','AddSlider')->name('add.slider');
        Route::post('/store/slider','StoreSlider')->name('store.slider');

        Route::get('/edit/slider/{id}','EditSlider')->name('edit.slider');
        Route::post('/update/slider','UpdateSlider')->name('update.slider');

        Route::get('/delete/slider/{id}','DeleteSlider')->name('delete.slider');
        
    });


    
    /////////// Banner ///////////

    Route::controller(BannerController::class)->group(function(){
    
        Route::get('/all/banner','AllBanner')->name('all.banner');

        Route::get('/add/banner','AddBanner')->name('add.banner');
        Route::post('/store/banner','StoreBanner')->name('store.banner');

        Route::get('/edit/banner/{id}','EditBanner')->name('edit.banner');
        Route::post('/update/banner','UpdateBanner')->name('update.banner');

        Route::get('/delete/banner/{id}','DeleteBanner')->name('delete.banner');
        
    });


}); // End Middleware


/// frontend product details

Route::get('/product/details/{id}/{slug}',[IndexController::class,'ProductDetails']);