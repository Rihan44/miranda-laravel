<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController;

use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);

Route::get('/about', [AboutController::class, 'index']);

Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/rooms-request', [RoomController::class, 'search_results']);
Route::get('/rooms_details/{id}', [RoomController::class, 'show']);
Route::post('/rooms_details/{id}', [BookingController::class, 'store']);
// Route::get('/rooms_details/{id}', [BookingController::class, 'check_availability']);

Route::get('/offers', [OfferController::class, 'index']);

Route::get('/contact', [ContactController::class, 'create']);
Route::post('/contact', [ContactController::class, 'store']);

