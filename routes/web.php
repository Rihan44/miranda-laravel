<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OrderController;

use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);

Route::get('/room_service', function () {
    return view('room_service');
})->middleware(['auth', 'verified'])->name('room_service');

Route::get('/edit_order/{id}', function () {
    return view('edit_order');
})->middleware(['auth', 'verified'])->name('edit_order');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/orders', [OrderController::class, 'index'])->middleware(['auth', 'verified'])->name('orders');
    Route::delete('/orders', [OrderController::class, 'destroy'])->name('orders.destroy');
});

Route::get('/about', [AboutController::class, 'index']);

Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/rooms-request', [RoomController::class, 'search_results']);
Route::get('/rooms_details/{id}', [RoomController::class, 'show']);
Route::post('/rooms_details/{id}', [BookingController::class, 'store']);

Route::get('/offers', [OfferController::class, 'index']);

Route::get('/contact', [ContactController::class, 'create']);

require __DIR__.'/auth.php';
