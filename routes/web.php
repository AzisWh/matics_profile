<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

//home
Route::get('/',[HomeController::class,'index']);
Route::get('/detail',[HomeController::class,'detail']);

//auth
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::get('/logout',[AuthController::class,'logout']);
Route::post('/login',[AuthController::class,'authenticate']);

//dashboard
Route::get('/dashboard', [DashboardController::class,'index'])->middleware('auth');

//crud
Route::resource('news',NewsController::class)->middleware('auth');
Route::resource('member',MemberController::class)->middleware('auth');
