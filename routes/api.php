<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiCatController;
use App\Http\Controllers\ApiBookController;
use App\Http\Controllers\ApiUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//cats
Route::get('/cats', [ApiCatController::class , 'index']);
Route::get('/cats/show/{id}', [ApiCatController::class , 'show']);
Route::post('/cats/store', [ApiCatController::class , 'store']);
Route::post('/cats/update/{id}', [ApiCatController::class , 'update']);
Route::delete('/cats/delete/{id}', [ApiCatController::class , 'delete']);



//books
Route::get('/books', [ApiBookController::class , 'index']);
Route::get('/books/show/{id}', [ApiBookController::class , 'show']);
Route::post('/books/store', [ApiBookController::class , 'store']);
Route::put('/books/update/{id}', [ApiBookController::class , 'update']);
Route::delete('/books/delete/{id}', [ApiBookController::class , 'delete']);

//user
Route::get('/users', [ApiUserController::class , 'index']);