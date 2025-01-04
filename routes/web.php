<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\BookController;


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


Route::get('/cats', [CatController::class , 'index']);
Route::get('/cats/show/{id}', [CatController::class , 'show']);
Route::get('/cats/create', [CatController::class , 'create']);
Route::post('/cats/store', [CatController::class , 'store']);
Route::get('/cats/edit/{id}', [CatController::class , 'edit']);
Route::post('/cats/update/{id}', [CatController::class , 'update']);
Route::get('/cats/delete/{id}', [CatController::class , 'delete']);
Route::get('/cats/search', [CatController::class, 'search']);


Route::get('/books', [BookController::class , 'index']);
Route::get('/books/show/{id}', [BookController::class , 'show']);
Route::get('/books/create', [BookController::class , 'create']);
Route::post('/books/store', [BookController::class , 'store']);
