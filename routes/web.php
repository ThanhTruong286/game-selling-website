<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'returnViewHome'])->name('home');
Route::get('/shop',function(){
    return view('shop');
})->name('shop');

/* BACKEND ROUTES */
Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard.index');
Route::get('admin',[AuthController::class,'index'])->name('auth.index');//duong dan toi login form
Route::get('logout',[AuthController::class,'logout'])->name('auth.logout');
Route::post('login',[AuthController::class,'login'])->name('auth.login');//su dung phuong thuc login trong AuthController
