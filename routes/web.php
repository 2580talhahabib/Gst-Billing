<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GstBillController;
use App\Http\Controllers\PartiesTypeController;
use App\Http\Controllers\PartyController;
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
Route::get('/parties_type_edit/{id}',[PartiesTypeController::class,'parties_type_edit'])->name('parties_type_edit');
Route::post('/parties_type_update/{id}',[PartiesTypeController::class,'parties_type_update'])->name('parties_type_update');
Route::delete('/parties_type_delete/{id}',[PartiesTypeController::class,'parties_type_delete'])->name('parties_type_delete');


// parties controller 
Route::get('/parties',[PartyController::class,'index'])->name('parties.index');
Route::get('/parties-create',[PartyController::class,'create'])->name('parties.create');
Route::post('/parties-store',[PartyController::class,'store'])->name('parties.store');
Route::get('/parties-edit/{id}',[PartyController::class,'edit'])->name('parties.edit');
Route::put('/parties-update/{id}',[PartyController::class,'update'])->name('parties.update');
Route::delete('/parties-Destroy/{id}',[PartyController::class,'Destroy'])->name('parties.Destroy');
});

// Gst Bill  controller 
Route::get('/bills',[GstBillController::class,'index'])->name('bills.index');
Route::get('/bills-create',[GstBillController::class,'create'])->name('bills.create');
Route::post('/bills-store',[GstBillController::class,'store'])->name('bills.store');
Route::get('/bills-edit/{id}',[GstBillController::class,'edit'])->name('bills.edit');
Route::put('/bills-update/{id}',[GstBillController::class,'update'])->name('bills.update');
Route::delete('/bills-Destroy/{id}',[GstBillController::class,'Destroy'])->name('bills.Destroy');


Route::get('logout',[AuthController::class,'logout'])->name('logout');