<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\AboutController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ServiceController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', HomeController::class)->name('index');

Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/create', [ServiceController::class, 'create'])->name('create.services');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');

Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/about', [AboutController::class, 'show'])->name('about');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
