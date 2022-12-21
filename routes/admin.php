<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/admin-login',[LoginController::class,'adminLogin'])->name('admin.login');

Route::prefix('admin')->middleware('is_admin')->group(function(){

    Route::get('/test',[AdminController::class,'test']);
    Route::get('/home',[AdminController::class,'admin'])->name('admin.home');
    Route::get('/logout',[AdminController::class,'adminLogout'])->name('admin.logout');

    //category routes
	Route::prefix('category')->group(function () {
        Route::get('/',[CategoryController::class,'index'])->name('category.index');
        Route::post('/store',[CategoryController::class,'store'])->name('category.store');
		Route::get('/delete/{id}',[CategoryController::class,'destroy'])->name('category.delete');
		Route::get('/edit/{id}',[CategoryController::class,'edit']);
		Route::post('/update',[CategoryController::class,'update'])->name('category.update');
    });

});


















// Route::get('/test', function () {
//     return view('admin.master');
// })->name('user');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
