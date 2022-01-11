<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ProductcategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImagesController;

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
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\DecidingController::class, 'check'])->name('home');
    // superadmin routes
    Route::get('/superadminAddUserPage', [UsersController::class, 'ShowAddPage'])->name('superadminAddUserPage');
    Route::post('/superadminAddUser', [UsersController::class, 'Add'])->name('superadminAddUser');
    Route::get('/superadminShowList', [UsersController::class, 'Show'])->name('superadminShowList');
    Route::get('/superAdmin/RoleDelete/{id}', [UsersController::class, 'Destroy']);
    Route::get('/superAdmin/RoleEdit/{id}', [UsersController::class, 'Edit']);
    Route::post('/superAdmin/RoleUpdate/{id}', [UsersController::class, 'Update']);
    // admin routes
    Route::get('/adminConfiguration', [UsersController::class, 'ShowAddPage'])->name('adminConfiguration');

    Route::post('/adminBanner', [UsersController::class, 'Add'])->name('adminBanner');
    // admin category routes
    Route::get('/adminCategory', [ProductcategoryController::class, 'ShowCategory'])->name('adminCategory');
    Route::get('/admin/addCategoryPage', [ProductcategoryController::class, 'ShowAddCategoryPage']);
    Route::post('/admin/category/add',[ProductcategoryController::class,'Store']);
    Route::get('/admin/category/delete/{id}', [ProductcategoryController::class, 'Destroy']);
    // admin products routes
    Route::get('/adminProducts', [ProductController::class, 'Show'])->name('adminProducts');
    Route::get('/admin/addProductPage', [ProductController::class, 'ShowAddProductPage']);
    Route::post('/admin/product/add',[ProductController::class,'Store']);
    Route::get('/admin/product/edit/{id}', [ProductController::class, 'Edit']);
    Route::post('/admin/product/update/{id}', [ProductController::class, 'Update']);
    Route::get('/admin/product/delete/{id}', [ProductController::class, 'Destroy']);
    // admin product images routes
    Route::get('/admin/product/images/{id}', [ProductImagesController::class, 'ShowImages']);
    Route::get('/admin/addProductImagePage/{id}', [ProductImagesController::class, 'AddImages']);
    Route::post('/admin/add/images/{id}', [ProductImagesController::class, 'Save']);
    Route::get('/admin/product/image/delete/{id}', [ProductImagesController::class, 'Destroy']);


    Route::post('/adminCms', [UsersController::class, 'Update'])->name('adminCms');
    Route::post('/adminOrder', [UsersController::class, 'Add'])->name('adminOrder');
    Route::get('/adminReports', [UsersController::class, 'Show'])->name('adminReports');
    // admin contact us routes
    Route::get('/adminContactUs', [ContactUsController::class, 'ShowContactUs'])->name('adminContactUs');
    Route::get('/admin/contactus/delete/{id}', [ContactUsController::class, 'Destroy']);
    // admin coupon routes
    Route::get('/adminCoupon', [CouponController::class, 'ShowCoupon'])->name('adminCoupon');
    Route::get('/admin/addCouponPage', [CouponController::class, 'ShowAddCouponPage']);
    Route::post('/admin/Coupon/add',[CouponController::class,'Store']);
    Route::get('/admin/coupon/delete/{id}', [CouponController::class, 'Destroy']);
    Route::get('/admin/coupon/edit/{id}', [CouponController::class, 'Edit']);
    Route::post('/admin/coupon/update/{id}', [CouponController::class, 'Update']);
   

});
