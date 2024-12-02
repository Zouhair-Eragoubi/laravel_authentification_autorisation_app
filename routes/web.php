<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontHomeController;
use App\Http\Controllers\BackHomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
// Route::prefix('front')->name("front.")->group(function(){
//     Route::view("/login","front.auth.login");
//     Route::view("/register","front.auth.register");
//     Route::view("/forget-password","front.auth.forget-password");
// });

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', FrontHomeController::class)->middleware(['auth'])->name('dashboard');
Route::get('/back', BackHomeController::class)->middleware(['adminAuth'])->name('back');

require __DIR__.'/auth.php';

Route::prefix('back')->name("back.")->group(function(){
    ##------------------------------------------------------- USERS MODULE
    Route::controller(UserController::class)->middleware(['adminAuth'])->group(function () {
        Route::resource('users', UserController::class);
    });

    ##------------------------------------------------------- ROLES MODULE
    Route::controller(RoleController::class)->middleware(['adminAuth'])->group(function () {
        Route::resource('roles', RoleController::class);
    });

    ##------------------------------------------------------- ADMINS MODULE
    Route::controller(AdminController::class)->middleware(['adminAuth'])->group(function () {
        Route::resource('admins', AdminController::class);
    });
    require __DIR__.'/adminAuth.php';
});
