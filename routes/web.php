<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/services', [PagesController::class, 'services']);

Auth::routes();

Route::get('/home', [HomeController::class])->name('home')->middleware('auth');
//Route::get('/profile', [ProfileController::class])->name('profile')->middleware('auth');
Route::get('/profile', ['uses' => ProfileController::class])->middleware('auth');
Route::post('/profile_update', [ProfileController::class, 'profile_update'])->name('profile_update')->middleware('auth');
Route::get('/chat', ['uses' => ChatController::class])->middleware('auth');

