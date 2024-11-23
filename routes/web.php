<?php

use App\Http\Controllers\FrontHomeController;
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
Route::prefix('front')->name("front.")->group(function(){
    Route::get('/', FrontHomeController::class)->name('index');
    Route::view("/login","front.auth.login");
    Route::view("/register","front.auth.register");
    Route::view("/forget-password","front.auth.forget-password");
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
