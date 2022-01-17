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
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderedProductsController;
use App\Http\Controllers\ProductAttributeController;

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

    // admin configuration routes
    Route::get('/adminConfiguration', [ConfigurationController::class, 'Show'])->name('adminConfiguration');
    Route::post('/admin/configuration/edit/{id}', [ConfigurationController::class, 'Update']);

    // admin banner routes
    Route::get('/adminBanner', [BannerController::class, 'Show'])->name('adminBanner');
    Route::get('/admin/addBannerPage', [BannerController::class, 'AddBanner']);
    Route::post('/admin/add/banner', [BannerController::class, 'Save']);
    Route::get('/admin/banner/delete/{id}', [BannerController::class, 'Destroy']);

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

    //  admin product attribute routes
    Route::get('/adminProductAttribute', [ProductAttributeController::class, 'Show'])->name('adminProductAttribute');
    Route::get('/admin/addProductAttributePage', [ProductAttributeController::class, 'AddPAge']);
    Route::post('/admin/product_attribute/add', [ProductAttributeController::class, 'Store']);
    Route::get('/admin/product_attribute/edit/{id}', [ProductAttributeController::class, 'Edit']);
    Route::post('/admin/product_attribute/update/{id}', [ProductAttributeController::class, 'Update']);
    Route::get('/admin/product_attribute/delete/{id}', [ProductAttributeController::class, 'Destroy']);

    // admin order management routes
    Route::get('/adminOrder', [OrderController::class, 'Show'])->name('adminOrder');
    Route::get('/admin/orderProduct/{id}', [OrderedProductsController::class, 'Show']);
    Route::get('/admin/order/edit/{id}', [OrderController::class, 'Edit']);
    Route::post('/admin/order/update/{id}', [OrderController::class, 'Update']);
    Route::get('/admin/order/delete/{id}', [OrderController::class, 'Destroy']);

    // admin reports management routes
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
