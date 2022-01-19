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

//spillway
Route::get('/spillway',  [App\Http\Controllers\SpillwayController::class, 'index']);

//status iot
Route::get('/status-iot',  [App\Http\Controllers\StatusIotController::class, 'index']);
Route::get('/status-iot/create',  [App\Http\Controllers\StatusIotController::class, 'create']);
Route::post('/status-iot/store',  [App\Http\Controllers\StatusIotController::class, 'store']);
Route::get('/status-iot/{id}/edit',  [App\Http\Controllers\StatusIotController::class, 'edit']);
Route::put('/status-iot/{id}/update',  [App\Http\Controllers\StatusIotController::class, 'update']);
Route::delete('/status-iot/{id}/destroy',  [App\Http\Controllers\StatusIotController::class, 'destroy']);