<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

// Home Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/blog/detail/{id}', [HomeController::class, 'blogDetail'])->name('blog/detail');

// Registration Routes
Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store']);

// Login Routes
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

// Logout Route
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Blog Routes
Route::middleware(['auth.user'])->group(function () {
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
    Route::get('/addblog', [BlogController::class, 'create'])->name('addblog');
    Route::post('/addblog', [BlogController::class, 'store']);
    Route::get('/editblog/{id}', [BlogController::class, 'edit'])->name('editblog');
    Route::post('/editblog/{id}', [BlogController::class, 'update']);
    Route::delete('/deleteBlog/{id}', [BlogController::class, 'destroy']);
});