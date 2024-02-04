<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\ProductPageController;
use App\Http\Controllers\ProductContoller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\OrderPageController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

use Illuminate\Support\Facades\Auth;

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


Route::get('/', [FrontPageController::class, 'index']);

Route::get('logout', [LoginController::class, 'logout']);

Route::post('customproduct/deleteData', [ProductController::class, 'deleteData'])->name('product-admin.deleteData');
Route::post('customproduct/changeImage', [ProductController::class, 'changeImage'])->name('product-admin.changeImage');

Route::post('/category/showProducts', [CategoryController::class, 'showProducts'])->name('category-admin.showProducts');
Route::post('customcategory/getEditForm', [CategoryController::class, 'getEditForm'])->name('category-admin.getEditForm');
Route::post('customcategory/saveDataTD', [CategoryController::class, 'saveDataTD'])->name('category-admin.saveDataTD');
Route::post('customcategory/changeImage', [CategoryController::class, 'changeImage'])->name('category-admin.changeImage');

Route::post('/type/showProducts', [TypeController::class, 'showProducts'])->name('type-admin.showProducts');
Route::post('customtype/getEditForm', [TypeController::class, 'getEditForm'])->name('type-admin.getEditForm');
Route::post('customtype/saveDataTD', [TypeController::class, 'saveDataTD'])->name('type-admin.saveDataTD');
Route::post('customtype/deleteData', [TypeController::class, 'deleteData'])->name('type-admin.deleteData');
Route::post('customtype/changeImage', [TypeController::class, 'changeImage'])->name('type-admin.changeImage');

Route::post('custompromo/getEditForm', [PromoController::class, 'getEditForm'])->name('promo-admin.getEditForm');

Route::post('customuser/getEditForm', [UserController::class, 'getEditForm'])->name('user-admin.getEditForm');

Route::post('customorder/getOrderForm', [OrderController::class, 'getOrderForm'])->name('order-admin.getOrderForm');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::get('checkout',[ProductPageController::class,'checkout'])->name('checkout');
    Route::get('checkout/confirm',[ProductPageController::class,'confirmCheckout'])->name('confirmCheckout');
    Route::get('profile',[FrontPageController::class,'profile'])->name('profile');
    Route::resource('/product-admin', ProductController::class);
    Route::resource('/category-admin', CategoryController::class);
    Route::resource('/type-admin', TypeController::class);
    Route::resource('/promo-admin', PromoController::class);
    Route::resource('/user-admin',UserController::class);
    Route::resource('/order-admin',OrderController::class);
    Route::get('admin', [AdminController::class, 'index']);

    Route::get('/history', [OrderPageController::class, 'index']);
    Route::get('/report/bestselling', [ReportController::class, 'bestSellingProducts'])->name('report.best_selling_products');
    Route::get('/report/mostorders', [ReportController::class, 'userMost'])->name('report.userMost');
});

Route::get('product-list', [ProductPageController::class, 'index']);
Route::get('/product-list/detail/{id}', [ProductPageController::class, 'detail'])->name('product-page-detail');
Route::get('/product-list/{id}', [ProductPageController::class, 'list'])->name('product-page-list');
Route::get('/product-list-type/{id}', [ProductPageController::class, 'listType'])->name('product-page-list-type');
Route::post('/product-list/searchID',[ProductPageController::class,'showSearchProductByID'])->name('showSearchProductByID');

Route::get('cart',[ProductPageController::class,'cart']);
Route::get('product-list/addcart/{id}',[ProductPageController::class,'addToCart'])->name('addToCart');
Route::get('product-list/removecart/{id}',[ProductPageController::class,'removeFromCart'])->name('removeFromCart');

Route::post('product-detail/addToCartWithQuantity',[ProductPageController::class,'addToCartWithQuantity'])->name('addToCartWithQuantity');

Route::post('checkout/applyPromo',[ProductPageController::class,'applyPromo'])->name('applyPromo');

Route::post('product-list/addQuantity',[ProductPageController::class,'addQuantity'])->name('addQuantity');
Route::post('product-list/reduceQuantity',[ProductPageController::class,'reduceQuantity'])->name('reduceQuantity');
Route::post('product-list/countTotalAll',[ProductPageController::class,'countTotalAll'])->name('countTotalAll');

Route::post('/history/getOrderDetail',[OrderPageController::class,'getDetailOrders'])->name('getDetailOrders');
