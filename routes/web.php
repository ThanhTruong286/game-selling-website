<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\HomeController;
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

Route::get('/{page?}',[HomeController::class,'index'])->name('home');//set home name and call 'show' function in ViewController

Route::prefix('categories')->group(function () {
    Route::get('/admin/add', [CategoryController::class,'add'])->name('categories.add');
    Route::get('/{slug?}', [CategoryController::class,'index'])->name('categories.index');//set a name for route and call function index from store controller

});
Route::prefix('store')->group(function(){
    Route::get('/', [StoreController::class, 'index'])->name('store.index');//set a name for route and call function index
});
