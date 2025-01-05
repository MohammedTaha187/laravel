<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;


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

Route::get('/', function () {
    return redirect('/cats');
});


Route::get('/cats', [CatController::class , 'index'])->middleware('auth');
Route::get('/cats/show/{id}', [CatController::class , 'show']);
Route::get('/cats/create', [CatController::class , 'create'])->middleware('auth');
Route::post('/cats/store', [CatController::class , 'store'])->middleware('auth');
Route::get('/cats/edit/{id}', [CatController::class , 'edit'])->middleware('auth');
Route::post('/cats/update/{id}', [CatController::class , 'update'])->middleware('auth');
Route::get('/cats/delete/{id}', [CatController::class , 'delete'])->middleware('auth');
Route::get('/cats/search', [CatController::class, 'search'])->middleware('auth');


Route::get('/books', [BookController::class , 'index'])->middleware('auth');
Route::get('/books/show/{id}', [BookController::class , 'show']);
Route::get('/books/create', [BookController::class , 'create'])->middleware('auth');
Route::post('/books/store', [BookController::class , 'store'])->middleware('auth');


Route::get('/register' ,[AuthController::class , 'registerForm'])->middleware('guest');
Route::post('/register' ,[AuthController::class , 'register'])->middleware('guest');
Route::get('/login' ,[AuthController::class , 'loginForm'])->middleware('guest');
Route::post('/login' ,[AuthController::class , 'login'])->middleware('guest');
Route::get('/logout' ,[AuthController::class , 'logout'])->middleware('auth');

Route::get('/allusers' ,[UserController::class , 'index'])->middleware('auth')->middleware('is_admin');