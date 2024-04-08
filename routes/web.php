<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register',[AdminController::class,'create'])->name('create.admins');
Route::post('/register',[AdminController::class,'store'])->name('store.admins');
Route::get('/login',[AdminController::class,'login'])->name('login.admins');
Route::post('/login',[AdminController::class,'loginCheck'])->name('loginCheck.admins');
Route::get('/logout',[AdminController::class,'logout'])->name('logout.admins');

Route::get('/category/create',[CategoryController::class,'create'])->name('create.category');
Route::post('/category/create',[CategoryController::class,'store'])->name('store.category');
Route::get('/category/list',[CategoryController::class,'index'])->name('list.category');
Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('edit.category');
Route::post('/category/update/{category}',[CategoryController::class,'update'])->name('update.category');
Route::post('/category/delete',[CategoryController::class,'destroy'])->name('destroy.category');

Route::get('/product/create',[ProductController::class,'create'])->name('create.product');
Route::post('/product/create',[ProductController::class,'store'])->name('store.product');
Route::get('/product/list',[ProductController::class,'index'])->name('list.product');
Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('edit.product');
Route::put('/product/update/{id}',[ProductController::class,'update'])->name('update.product');
Route::delete('/product/delete/{id}',[ProductController::class,'destroy'])->name('delete.product');
Route::get('/product/addDetail/{id}',[ProductController::class,'addDetail'])->name('addDetail.product');
Route::post('/product/addDetail',[ProductController::class,'storeDetail'])->name('storeDetail.product');

Route::middleware(['authAdmin'])->group(function(){
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
});