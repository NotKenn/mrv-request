<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
 
Route::get('dashboard', function () {
    return view('dashboard.index');
});

Route::get('/', fn () => (view('dashboard.index')))->middleware('auth');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
//route resource
Route::resource('/requests', \App\Http\Controllers\RequestController::class);
Route::resource('/homepage', \App\Http\Controllers\HomeController::class);
Route::resource('/users', \App\Http\Controllers\ApprovingUsers::class);
Route::resource('/approvers', \App\Http\Controllers\Approvers::class);
Route::resource('/', \App\Http\Controllers\DashboardController::class);
Route::resource('/items', \App\Http\Controllers\ItemController::class);
Route::get('orders_pdf', [\App\Http\Controllers\RequestController::class, 'cetak_pdf']);
Route::get('users_pdf', [\App\Http\Controllers\ApprovingUsers::class, 'cetak_pdf']);
Route::get('items_pdf', [\App\Http\Controllers\ItemController::class, 'cetak_pdf']);
Route::get('approvers_pdf', [\App\Http\Controllers\Approvers::class, 'cetak_pdf']);
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

