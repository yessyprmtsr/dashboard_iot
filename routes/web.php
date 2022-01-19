<?php

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

Auth::routes();
//home routes
Route::get('/',  [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//ketinggian air routes
Route::get('/ketinggian-air',  [App\Http\Controllers\KetinggianAirController::class, 'index']);

//ketinggian air routes
Route::get('/spillway',  [App\Http\Controllers\SpillwayController::class, 'index']);