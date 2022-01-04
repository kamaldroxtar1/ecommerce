<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;

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
    Route::get('/superadminAddUserPage', [UsersController::class, 'ShowAddPage'])->name('superadminAddUserPage');
    Route::post('/superadminAddUser', [UsersController::class, 'Add'])->name('superadminAddUser');
    Route::get('/superadminShowList', [UsersController::class, 'Show'])->name('superadminShowList');
    Route::get('/superAdmin/RoleDelete/{id}', [UsersController::class, 'Destroy']);
    Route::get('/superAdmin/RoleEdit/{id}', [UsersController::class, 'Edit']);
    Route::post('/superAdmin/RoleUpdate/{id}', [UsersController::class, 'Update']);
});
