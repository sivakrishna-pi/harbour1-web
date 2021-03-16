<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group whichhttps://pidatacenters.com/harbour1_demo/products-home.php
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class, 'home']);
// Route::get('login',[AdminController::class, 'login'])->middleware('is_admin');
// Route::post('login',[AdminController::class, 'submit_login'])->middleware('is_admin');
Route::get('logout',[LoginController::class, 'logout'])->middleware('is_admin');

Auth::routes();


Route::get('category/{id}/delete',[CategoryController::class, 'destroy'])->middleware('is_admin');
Route::resource('category', CategoryController::class)->middleware('is_admin');
Route::get('post/{id}/delete',[PostController::class, 'destroy'])->middleware('is_admin');
Route::resource('post', PostController::class)->middleware('is_admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('is_admin');
Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('dashboard')->middleware('is_admin');
