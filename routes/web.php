<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');

// Tambahkan ini agar support klik dari home (opsional)
Route::get('/booking/create/{film?}/{jadwal?}', [BookingController::class, 'create'])->name('bookings.create');

Route::post('/booking', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/booking/{id}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
Route::put('/booking/{id}', [BookingController::class, 'update'])->name('bookings.update');
Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');