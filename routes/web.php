<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

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

Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
Route::get('/register',[AdminController::class,'create'])->name('create.admins');
Route::post('/register',[AdminController::class,'store'])->name('store.admins');
Route::get('/login',[AdminController::class,'login'])->name('login.admins');
Route::post('/login',[AdminController::class,'loginCheck'])->name('loginCheck.admins');
Route::get('/logout',[AdminController::class,'logout'])->name('logout.admins');

Route::get('/category/create',[CategoryController::class,'create'])->name('create.category');
Route::post('/category/create',[CategoryController::class,'store'])->name('store.category');
Route::get('/category/list',[CategoryController::class,'index'])->name('list.category');