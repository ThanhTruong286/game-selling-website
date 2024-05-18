<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\CartController;
use App\Http\Controllers\Backend\CommunityController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\Backend\VoucherController;
use App\Http\Middleware\DeveloperMiddleware;
use App\Http\Middleware\LibraryMiddleware;
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
Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard.index')->middleware('admin');//chi dc truy cap khi check dc da dang nhap qua mdw
/* USER */
Route::prefix('user')->group(function () {
    Route::get('logout',[AuthController::class,'logout'])->name('auth.logout');
    Route::post('login',[AuthController::class,'login'])->name('auth.login');//su dung phuong thuc login trong AuthController
    Route::get('signup-form', [AuthController::class,'returnViewSignup'])->name('signup.form');//duong dan toi chuc nang dang ky
    Route::post('signup', [AuthController::class,'signup'])->name('auth.signup');//duong dan toi chuc nang dang ky
    Route::get('login-form',[AuthController::class,'index'])->name('signin.form');//duong dan toi login form

    Route::get('reset-password',[AuthController::class,'reset_password_view'])->name('reset_password_view');
    Route::get('changepass',[AuthController::class,'changepass'])->name('changepass');
    Route::get('change-password',[AuthController::class,'returnResetPasswordView'])->name('make_new_password_view');
    Route::get('change-user-password',[AuthController::class,'changePAS'])->name('changePASS');
    Route::post('send-email-reset',[AuthController::class,'send_email_reset'])->name('send_email_reset');

    Route::get('make-new-password',[AuthController::class,'make_new_password'])->name('makeNewPass');
    // USER PROFILE
    Route::get('profile',[AuthController::class,'showProfile'])->name('profile')->middleware('check_login');
    Route::get('edit-profile-form',[AuthController::class,'edit_profile'])->name('edit.profile.form')->middleware('check_login');
    Route::post('edit',[AuthController::class,'edit'])->name('edit.profile')->middleware('check_login');
    Route::get('confirm-email',[AuthController::class,'confirm_email'])->name('confirm_email');
    Route::post('add-review',[ProductController::class,'add_review'])->name('add.review')->middleware('check_login');
    //USER DASHBOARD
    Route::get('dashboard',[UserController::class,'dashboard'])->name('developer.dashboard')->middleware(DeveloperMiddleware::class);
    Route::get('user-product',[UserController::class,'user_product'])->name('user.product')->middleware(DeveloperMiddleware::class);
    // LIBRARY
    Route::prefix('library')->group(function () {
        Route::get('home',[LibraryController::class,'user_library'])->name('library')->middleware('check_login')->middleware('user');
        Route::get('game',[LibraryController::class,'library_game'])->name('library.game')->middleware('check_login')->middleware(LibraryMiddleware::class);
        Route::get('delete',[LibraryController::class,'delete_game'])->name('delete.game.library')->middleware('check_login')->middleware(LibraryMiddleware::class);
    });
});
Route::get('product-detail', [ProductController::class,'product_detail'])->name('product.detail');

/* ADMIN */
Route::prefix('admin')->group(function () {
    Route::get('user', [UserController::class,'index'])->name('user.index')->middleware('admin');
    /* PRODUCT */

    Route::prefix('product')->group(function () {
    Route::get('home', [ProductController::class,'index'])->name('product.index')->middleware('admin');
    /* CRUD PRODUCT */
    Route::get('add-form', [ProductController::class,'add_form'])->name('product.add.form')->middleware(DeveloperMiddleware::class);
    Route::post('add', [ProductController::class,'add'])->name('product.add')->middleware(DeveloperMiddleware::class);
    Route::get('edit-form', [ProductController::class,'edit_form'])->name('product.edit.form')->middleware(DeveloperMiddleware::class);
    Route::post('edit', [ProductController::class,'edit'])->name('product.edit')->middleware(DeveloperMiddleware::class);
    Route::get('delete', [ProductController::class,'delete'])->name('product.delete')->middleware(DeveloperMiddleware::class);
    Route::get('add-gallery-form',[ProductController::class,'add_gallery_form'])->name('add.gallery.form')->middleware(DeveloperMiddleware::class);
    Route::post('add-gallery',[ProductController::class,'add_gallery'])->name('add.gallery')->middleware(DeveloperMiddleware::class);
});
    // CRUD CATEGORIES
    Route::prefix('category')->group(function () {
        Route::get('home', [CategoryController::class,'home'])->name('category.crud')->middleware('admin');
        Route::get('add-form', [CategoryController::class,'add_form'])->name('category.add.form')->middleware('admin');
        Route::post('add', [CategoryController::class,'add'])->name('category.add')->middleware('admin');
        Route::get('edit-form', [CategoryController::class,'edit_form'])->name('category.edit.form')->middleware('admin');
        Route::post('edit', [CategoryController::class,'edit'])->name('category.edit')->middleware('admin');
        Route::get('delete', [CategoryController::class,'delete'])->name('category.delete')->middleware('admin');
        });
        Route::prefix('voucher')->group(function(){
            Route::get('home',[VoucherController::class,'home'])->name('voucher.crud')->middleware('admin');
            Route::get('add-form', [VoucherController::class,'add_form'])->name('voucher.add.form')->middleware('admin');
            Route::post('add', [VoucherController::class,'add'])->name('voucher.add')->middleware('admin');
            Route::get('edit-form', [VoucherController::class,'edit_form'])->name('voucher.edit.form')->middleware('admin');
            Route::post('edit', [VoucherController::class,'edit'])->name('voucher.edit')->middleware('admin');
            Route::get('delete', [VoucherController::class,'delete'])->name('voucher.delete')->middleware('admin');
        });
/* WEB CONTENT*/

});
/* CART */

Route::get('add-to-cart/{product_id}', [CartController::class,'add'])->name('add.to.cart')->middleware('cart');
Route::get('cart', [CartController::class,'show_cart'])->name('show.cart')->middleware('cart');
Route::get('update-cart', [CartController::class,'updateCart'])->name('update.cart')->middleware('cart');
Route::get('delete-cart/{product_id}',[CartController::class,'delete'])->name('delete.cart')->middleware('cart');
Route::get('add-to-library', [CartController::class,'add_to_library'])->name('add.to.library')->middleware('cart');
/* CATEGORY */
Route::prefix('category')->group(function () {
    Route::get('/{search?}', [CategoryController::class,'index'])->name('category.home');
});
//WISHLIST
Route::get('wishlist',[CartController::class,'wishlist'])->name('wishlist')->middleware('check_login');
Route::get('add-to-wishlist',[CartController::class,'add_to_wishlist'])->name('add.to.wishlist')->middleware('check_login');
Route::get('delete-wishlist',[CartController::class,'delete_wishlist'])->name('delete.wishlist')->middleware('check_login');
//LIST FRIEND
Route::get('list-friend',[CommunityController::class,'list_friend'])->name('list.friend')->middleware('check_login');
Route::get('add-friend',[CommunityController::class,'add_friend'])->name('add.friend')->middleware('check_login');
Route::get('delete-friend',[CommunityController::class,'delete_friend'])->name('delete.friend')->middleware('check_login');
//COMMUNITY
Route::get('community',[CommunityController::class,'community'])->name('community.home');
//COOP
Route::get('cooperation',[CommunityController::class,'cooperation'])->name('cooperation.home')->middleware('check_login');
Route::post('send-email-coop',[CommunityController::class,'send_email'])->name('cooperation.send.email')->middleware('check_login');
Route::get('confirm-coop-request',[CommunityController::class,'confirm_coop'])->name('cooperation.confirm')->middleware('admin');
Route::get('deny-coop-request',[CommunityController::class,'deny_coop'])->name('cooperation.deny')->middleware('admin');
// ORTHER
Route::post('payment',[CartController::class,'use_voucher'])->name('use.voucher')->middleware('check_login');
Route::get('voucher',[VoucherController::class,'voucher_view'])->name('voucher.view')->middleware('check_login');
Route::get('take-voucher',[VoucherController::class,'take_voucher'])->name('voucher')->middleware('check_login');
Route::get('trending', [CategoryController::class,'trending'])->name('category.trending');
Route::get('most-played', [CategoryController::class,'most_play'])->name('category.most.play');
Route::get('session', [HomeController::class,'session'])->name('session');
Route::post('online-checkout', [CartController::class,'online_checkout'])->name('payment');
Route::get('thanks', [CartController::class,'thanks'])->name('thanks');
Route::get('contact', [HomeController::class,'contact'])->name('contact');


