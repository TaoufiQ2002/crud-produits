<?php

use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ProduitController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/products/create', [ProduitController::class, 'create'])->middleware(['auth'])->name('products.create');
Route::post('/products', [ProduitController::class, 'store'])->name('products.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
