<?php

use App\Http\Controllers\AuthController;
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
Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');


