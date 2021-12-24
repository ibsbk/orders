<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
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


Route::get('/', [UserController::class,'mainView'])->name('/');
//Route::post('/', [UserController::class,'addPostPost']);

Route::get('/reg', [UserController::class,'regView'])->name('reg');
Route::post('/reg', [UserController::class,'regPost']);

Route::get('/auth', [UserController::class,'authView'])->name('auth');
Route::post('/auth', [UserController::class,'authPost']);

Route::get('/logout', [UserController::class,'logout'])->name('logout');

Route::get('/lk', [UserController::class,'lkView'])->name('lk');

Route::get('/addPost', [PostsController::class,'addPostView'])->name('addPost');

Route::get('/getPosts', [PostsController::class,'getPosts'])->name('getPosts');

Route::get('/editPost/{id}', [PostsController::class,'editPostView'])->name('editPost/{id}');
Route::post('/editPost/{id}', [PostsController::class,'editPostPost']);

Route::get('/deletePost/{id}', [PostsController::class, 'deletePost'])->name('deletePost/{id}');

Route::get('/admin', [AdminController::class,'adminView'])->name('admin');
Route::post('/adminPost', [AdminController::class,'adminPost']);

