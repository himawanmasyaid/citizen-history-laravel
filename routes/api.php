<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\EntrepreneurController;
use App\Http\Controllers\Api\TourController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/articles', [ArticleController::class, 'index']);
// Route::post('/articles', [ArticleController::class, 'store']);
// Route::get('/articles/{id}', [ArticleController::class, 'show']);
// Route::patch('/articles/{id}', [ArticleController::class, 'update']);
// Route::delete('/articles/{id}', [ArticleController::class, 'destroy']);

// Route::get('/entrepreneurs', [EntrepreneurController::class, 'index']);
// Route::post('/entrepreneurs', [EntrepreneurController::class, 'store']);
// Route::get('/entrepreneurs/{id}', [EntrepreneurController::class, 'show']);
// Route::patch('/entrepreneurs/{id}', [EntrepreneurController::class, 'update']);
// Route::delete('/entrepreneurs/{id}', [EntrepreneurController::class, 'destroy']);

// Route::get('/tours', [TourController::class, 'index']);
// Route::post('/tours', [TourController::class, 'store']);
// Route::get('/tours/{id}', [TourController::class, 'show']);
// Route::patch('/tours/{id}', [TourController::class, 'update']);
// Route::delete('/tours/{id}', [TourController::class, 'destroy']);

// Route::get('/users', [UserController::class, 'index']);

Route::apiResource('articles', ArticleController::class);
Route::apiResource('entrepreneurs', EntrepreneurController::class);
Route::apiResource('tours', TourController::class);
Route::apiResource('users', UserController::class);
