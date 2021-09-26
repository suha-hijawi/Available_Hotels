<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HotelsController;
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

Route::get('/',[HotelsController::class,'getHotels']);

Route::get('hotels/available',[HotelsController::class,'getAvailableHotels']);

Route::get('hotels/details/{hotel_name}',[HotelsController::class,'getHotelDetails']);


Auth::routes();
