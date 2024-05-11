<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/admin/dashboard', [DashboardController::class,'index'])->name('admin.dashboard');

// Posts Routes
Route::resource('posts', PostController::class);

// Categories Routes
Route::resource('categories', CategoryController::class);

// News Routes
Route::resource('news', NewsController::class);
