<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//access api
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/ketinggian-air',  [App\Http\Controllers\ApiController::class, 'inputKetinggianAir']);
Route::get('/spillway',  [App\Http\Controllers\ApiController::class, 'inputSpillway']);
Route::get('/getdata',  [App\Http\Controllers\ApiController::class, 'getData']);
