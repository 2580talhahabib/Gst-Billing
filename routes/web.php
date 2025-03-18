<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PartiesTypeController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    // Dashboard controller 
Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

// parties type controller 
Route::get('/parties_type',[PartiesTypeController::class,'parties_type'])->name('parties_type');
Route::get('/parties_type_add',[PartiesTypeController::class,'parties_type_add'])->name('parties_type_add');
Route::post('/parties_type_store',[PartiesTypeController::class,'parties_type_store'])->name('parties_type_store');

});

Route::get('logout',[AuthController::class,'logout'])->name('logout');