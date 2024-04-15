<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductBookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* ----------------Customer Sector Starts-------------------- */

Route::get('/register',[CustomerController::class,'create'])->name('register.customer');
Route::post('/register',[CustomerController::class,'store'])->name('storeUser.customer');
Route::get('/login',[CustomerController::class,'login'])->name('login.customer');
Route::post('/loginPermission',[CustomerController::class,'loginPermission'])->name('loginPermission.customer');
Route::get('/logout',[CustomerController::class,'logout'])->name('logout.customer');
Route::get('/',[CustomerController::class,'index'])->name('home');
Route::get('/productView/{id}',[CustomerController::class,'productView'])->name('productView.customer');

/* -------------------Customer Sector Ends----------------------- */
/* -----------CartController Starts-------------------------- */
Route::get('/cart',[CartController::class,'index'])->name('cart.customer');
Route::post('/cart/store',[CartController::class,'store'])->name('cartStore.customer');
Route::get('/cart/delete',[CartController::class,'destroy'])->name('delete.cart');
/* -----------CartController Ends-------------------------- */
/* -----------ProductBookingController Starts-------------------------- */
Route::post('/product/booking',[ProductBookingController::class,'store'])->name('product.booking');
Route::get('/prouct/bookingSuccess',[ProductBookingController::class,'bookingSuccess'])->name('product.bookingSuccess');
Route::get('/product/bookingFail',[ProductBookingController::class,'bookingFail'])->name('product.bookingFail');
/* -----------ProductBookingController Ends-------------------------- */
/* ---------------Admin Sector starts------------------ */
Route::get('/admin/login',[AdminController::class,'login'])->name('login.admins');
Route::post('/admin/login',[AdminController::class,'loginCheck'])->name('loginCheck.admins');

Route::prefix('admin')->middleware(['authAdmin'])->group(function(){
    Route::get('/logout',[AdminController::class,'logout'])->name('logout.admins');
    Route::get('/register',[AdminController::class,'create'])->name('create.admins');
    Route::post('/register',[AdminController::class,'store'])->name('store.admins');
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
/* --------------Category Controller start------------------ */
    Route::get('/category/create',[CategoryController::class,'create'])->name('create.category');
    Route::post('/category/create',[CategoryController::class,'store'])->name('store.category');
    Route::get('/category/list',[CategoryController::class,'index'])->name('list.category');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('edit.category');
    Route::post('/category/update/{category}',[CategoryController::class,'update'])->name('update.category');
    Route::post('/category/delete',[CategoryController::class,'destroy'])->name('destroy.category');
    /* -------------------Product Controller start-------------------- */
    Route::get('/product/create',[ProductController::class,'create'])->name('create.product');
    Route::post('/product/create',[ProductController::class,'store'])->name('store.product');
    Route::get('/product/list',[ProductController::class,'index'])->name('list.product');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('edit.product');
    Route::put('/product/update/{id}',[ProductController::class,'update'])->name('update.product');
    Route::delete('/product/delProduct/{id}',[ProductController::class,'destroy'])->name('delete.product');
    Route::get('/product/addDetail/{id}',[ProductController::class,'addDetail'])->name('addDetail.product');
    Route::post('/product/addDetail',[ProductController::class,'storeDetail'])->name('storeDetail.product');

});

