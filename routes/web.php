<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\TourController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EntrepreneurController;
use App\Http\Controllers\QuizController;

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

// Route::get('/dashboard/quizzes', function () {
//     return view('dashboard.quizzes.index');
// });
// Route::get('/dashboard/articles/create', function () {
//     return view('dashboard.articles.create');
// });

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/dashboard/articles', ArticleController::class)->middleware('auth');
Route::resource('/dashboard/entrepreneurs', EntrepreneurController::class)->middleware('auth');
Route::resource('/dashboard/tours', TourController::class)->middleware('auth');
Route::resource('/dashboard/users', UserController::class)->middleware('auth');
Route::resource('/dashboard/quizzes', QuizController::class)->middleware('auth');
Route::resource('/dashboard/categories', CategoryController::class)->middleware('auth');

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});