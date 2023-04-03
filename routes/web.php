<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\UseCouponController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\StripeController;
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

Route::get('/',[IndexController::class,'Index'])->name('home');

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

    /////////// coupon ///////////

    Route::controller(CouponController::class)->group(function(){
    
        Route::get('/all/coupon','AllCoupon')->name('all.coupon');

        Route::get('/add/coupon','AddCoupon')->name('add.coupon');
        Route::post('/store/coupon','StoreCoupon')->name('store.coupon');

        Route::get('/edit/coupon/{id}','EditCoupon')->name('edit.coupon');
        Route::post('/update/coupon','UpdateCoupon')->name('update.coupon');

        Route::get('/delete/coupon/{id}','DeleteCoupon')->name('delete.coupon');
        
       

    });

    

    /////////// Shipping State  ///////////

    Route::controller(ShippingAreaController::class)->group(function(){
    
        Route::get('/all/state','AllState')->name('all.state');

        Route::get('/add/state','AddState')->name('add.state');
        Route::post('/store/state','StoreState')->name('store.state');

        Route::get('/edit/state/{id}','EditState')->name('edit.state');
        Route::post('/update/state','UpdateState')->name('update.state');

        Route::get('/delete/state/{id}','DeleteState')->name('delete.state');
        
        Route::get('/district/ajax/{division_id}','GetDistrict');

    });


    Route::controller(OrderController::class)->group(function(){
    
        Route::get('/pending/order','PendingOrder')->name('pending.order');
        Route::get('/admin/order/details/{order_id}','AdminOrderDetails')->name('admin.order.details');

        Route::get('/admin/delivered/order' , 'AdminDeliveredOrder')->name('admin.delivered.order');

        Route::get('/processing/delivered/{order_id}' , 'ProcessToDelivered')->name('processing-delivered');

        Route::get('/admin/invoice/download/{order_id}' , 'AdminInvoiceDownload')->name('admin.invoice.download');
      

    });

    Route::controller(ContactController::class)->group(function(){
       
        Route::get('/all/message','AllMessage')->name('all.message');
        Route::get('/delete/message/{id}','DeleteMessage')->name('delete.message');
        Route::get('/reply/message/{id}','ReplyMessage')->name('reply.message');
        Route::post('/store/replymessage/','StoreReplyMessage')->name('store.replymessage');

        Route::get('/all/replymessage/','AllReplyMessage')->name('all.replymessage');
        Route::get('/delete/replymessage/{id}','DeleteReplyMessage')->name('delete.replymessage');


    });

}); // admin End Middleware


/// frontend product details

Route::get('/product/details/{id}/{slug}',[IndexController::class,'ProductDetails']);

/// frontend category 
Route::get('/product/category/{id}/{slug}',[IndexController::class,'CatWiseProduct']);

// Product View Model With Ajax
Route::get('/product/view/model/{id}/',[IndexController::class,'ProductViewAjax']);



Route::middleware(['auth','role:user'])->group(function(){

    Route::controller(CartController::class)->group(function(){

        // add to cart store data 
        Route::post('/cart/data/store/{id}/','AddToCart');
        
        // view cart details
        Route::get('/mycart','MyCart')->name('mycart');

        Route::get('/delete/cart/{id}','DeleteCart')->name('delete.cart');

        // checkout page route
        Route::get('/checkout/{AllTotal}','CheckoutCreate')->name('checkout');

    });

  

    // Stripe All Route 

    Route::controller(StripeController::class)->group(function(){
        Route::post('/stripe/order' , 'StripeOrder')->name('stripe.order');
        Route::post('/cash/order' , 'CashOrder')->name('cash.order');
    

    }); 

    Route::controller(AllUserController::class)->group(function(){

        Route::get('/user/account/page','UserAccount')->name('user.account.page');
        
        Route::get('/user/change/password','UserChangePassword')->name('user.change.password');
        
        Route::get('/user/order/page','UserOrderPage')->name('user.order.page');
        
        Route::get('/reply/page','ReplyMessagePage')->name('reply.message.page');
        
        Route::get('/user/order_details/{order_id}','UserOrderDetails');
        
        Route::get('/user/invoice_download/{order_id}','UserOrderInvoice');

    });

    Route::controller(IndexController::class)->group(function(){
        
        Route::get('/user/shop/page','ShopPage')->name('user.shop.page');

        Route::get('/user/contact/page','ContactPage')->name('user.contact.page');

        Route::post('/store/contact','StoreContact')->name('store.contact');

        Route::post('/search' , 'ProductSearch')->name('product.search'); 

    });

    
   
}); // End Middleware

Route::controller(ReviewController::class)->group(function(){

    Route::post('/store/review' , 'StoreReview')->name('store.review'); 
    Route::get('/pending/review' , 'PendingReview')->name('pending.review'); 
    Route::get('/review/approve/{id}' , 'ReviewApprove')->name('review.approve'); 
    Route::get('/publish/review' , 'PublishReview')->name('publish.review'); 
    Route::get('/review/delete/{id}' , 'ReviewDelete')->name('review.delete');

});
