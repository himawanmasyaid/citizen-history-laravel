<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EntrepreneurController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\UserController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard.dashboard');
// });

// Route::get('/dashboard/articles', function () {
//     return view('dashboard.articles.index');
// });
// Route::get('/dashboard/articles/create', function () {
//     return view('dashboard.articles.create');
// });

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resource('/dashboard/articles', ArticleController::class);
Route::resource('/dashboard/entrepreneurs', EntrepreneurController::class);
Route::resource('/dashboard/tours', TourController::class);
Route::resource('/dashboard/users', UserController::class);