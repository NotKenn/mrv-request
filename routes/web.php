<?php

use Illuminate\Support\Facades\Route;

//route resource
Route::resource('/requests', \App\Http\Controllers\RequestController::class);
Route::resource('/homepage', \App\Http\Controllers\HomeController::class);
Route::resource('/users', \App\Http\Controllers\ApprovingUsers::class);
Route::resource('/approvers', \App\Http\Controllers\Approvers::class);
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
