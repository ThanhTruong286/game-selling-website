<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AuthenticateMiddleware;

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

/* BACKEND ROUTES */
Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard.index')->middleware(AuthenticateMiddleware::class);//chi dc truy cap khi check dc da dang nhap qua mdw
Route::get('admin',[AuthController::class,'index'])->name('auth.index');//duong dan toi login form
Route::get('logout',[AuthController::class,'logout'])->name('auth.logout');
Route::post('login',[AuthController::class,'login'])->name('auth.login');//su dung phuong thuc login trong AuthController
Route::get('shop', [HomeController::class,'returnViewShop'])->name('shop.index');
