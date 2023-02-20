<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
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

Route::get('/', function () {
    return view('frontend.index');
});
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

Route::get('/admin/login',[AdminController::class,'AdminLogin']);





Route::middleware(['auth','role:admin'])->group(function(){
    
    /////////// Brand ///////////

    Route::controller(BrandController::class)->group(function(){
    
        Route::get('/all/brand','AllBrand')->name('all.brand');
        Route::get('/add/brand','AddBrand')->name('add.brand');
    
    });

}); // End Middleware

