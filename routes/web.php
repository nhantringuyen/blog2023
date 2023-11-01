<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->group(function (){
    Route::prefix('category')->group(function (){
        Route::get('',[CategoryController::class,'index'])->name('admin.category.index');
        Route::get('create',[CategoryController::class,'create'])->name('admin.category.create');
        Route::post('store',[CategoryController::class,'store'])->name('admin.category.store');
        Route::get('edit/${id}',[CategoryController::class,'edit'])->name('admin.category.edit');
        Route::put('update/${id}',[CategoryController::class,'update'])->name('admin.category.update');
        Route::get('delete/${id}',[CategoryController::class,'delete'])->name('admin.category.delete');
    });
    Route::prefix('post')->group(function (){
        Route::get('',[CategoryController::class,'index'])->name('admin.post.index');
        Route::get('create',[CategoryController::class,'create'])->name('admin.post.create');
        Route::post('store',[CategoryController::class,'store'])->name('admin.post.store');
        Route::get('edit/${id}',[CategoryController::class,'edit'])->name('admin.post.edit');
        Route::put('update/${id}',[CategoryController::class,'update'])->name('admin.post.update');
        Route::get('delete/${id}',[CategoryController::class,'delete'])->name('admin.post.delete');
    });
    Route::prefix('contact')->group(function (){
        Route::get('',[CategoryController::class,'index'])->name('admin.contact.index');
        Route::get('delete/${id}',[CategoryController::class,'delete'])->name('admin.contact.delete');
    });
    Route::prefix('user')->group(function (){
        Route::get('',[CategoryController::class,'index'])->name('admin.user.index');
        Route::get('create',[CategoryController::class,'create'])->name('admin.user.create');
        Route::post('store',[CategoryController::class,'store'])->name('admin.user.store');
        Route::get('edit/${id}',[CategoryController::class,'edit'])->name('admin.user.edit');
        Route::put('update/${id}',[CategoryController::class,'update'])->name('admin.user.update');
        Route::get('delete/${id}',[CategoryController::class,'delete'])->name('admin.user.delete');
    });
});
