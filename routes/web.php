<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ProductcategoryController;

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
    Route::get('/adminCategory', [ProductcategoryController::class, 'ShowCategory'])->name('adminCategory');
    Route::post('/admin/category/add',[ProductcategoryController::class,'Store']);
    Route::get('/admin/addCategoryPage', [ProductcategoryController::class, 'ShowAddCategoryPage']);
    Route::get('/adminProducts', [UsersController::class, 'Destroy'])->name('adminProducts');
    Route::get('/adminCoupon', [CouponController::class, 'ShowCoupon'])->name('adminCoupon');
    Route::post('/adminCms', [UsersController::class, 'Update'])->name('adminCms');
    Route::post('/adminOrder', [UsersController::class, 'Add'])->name('adminOrder');
    Route::get('/adminReports', [UsersController::class, 'Show'])->name('adminReports');
    Route::get('/adminContactUs', [ContactUsController::class, 'showContactUs'])->name('adminContactUs');
    Route::get('/admin/contactus/delete/{id}', [ContactUsController::class, 'Destroy']);
    Route::get('/admin/coupon/delete/{id}', [CouponController::class, 'Destroy']);
    Route::get('/admin/coupon/edit/{id}', [CouponController::class, 'Edit']);
    Route::post('/admin/coupon/update/{id}', [CouponController::class, 'Update']);
    Route::get('/admin/category/delete/{id}', [ProductcategoryController::class, 'Destroy']);

});
