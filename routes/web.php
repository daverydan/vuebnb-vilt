<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ListingController::class, 'index'])->name('home');

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Auth Routes
Route::middleware('auth')->group(function () {
    Route::get('listings/create', [ListingController::class, 'create'])->name('listings.create');
    Route::get('listings/{listing}/edit', [ListingController::class, 'edit'])->name('listings.edit');
    Route::post('listings', [ListingController::class, 'store'])->name('listings.store');
    Route::patch('listings/{listing}', [ListingController::class, 'update'])->name('listings.update');
    Route::delete('listings/{listing}', [ListingController::class, 'destroy'])->name('listings.destroy');

    Route::get('saved', [ListingController::class, 'index'])->name('saved');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Public Routes
Route::get('listings', [ListingController::class, 'index'])->name('listings.index');
Route::get('listings/{listing}', [ListingController::class, 'show'])->name('listings.show');

require __DIR__.'/auth.php';
