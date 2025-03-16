<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Auth\Events\Logout;
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


Route::get('/',[AuthController::class,'login'])->name('login');
Route::post('/loginauth',[AuthController::class,'loginauth'])->name('loginauth');
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register_auth',[AuthController::class,'register_auth'])->name('register_auth');
Route::get('/forgot_passwor',[AuthController::class,'forgot_passwor'])->name('forgot_password');

Route::middleware(['Admin'])->group(function () {
Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
});

Route::get('logout',[AuthController::class,'logout'])->name('logout');