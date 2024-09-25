<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TutorialController;

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

// Route::get('/', function () {
//     return view('index');
// });



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
Route::resource('/home', HomeController::class);
Route::resource('/year', YearController::class);
Route::resource('/tutorial', TutorialController::class);
Route::resource('/event', EventController::class);
Route::resource('/book', BookController::class);
Route::resource('/user', UserController::class);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
