<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\CommentaireController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [CommentaireController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('categories', CategoryController::class);
    Route::resource('annonces', AnnonceController::class);
    
    Route::post('annonces/{annonceId}/commentaires', [CommentaireController::class, 'store'])->name('commentaires.store');
    Route::get('commentaires/{id}/edit', [CommentaireController::class, 'edit'])->name('commentaires.edit');
    Route::put('commentaires/{id}', [CommentaireController::class, 'update'])->name('commentaires.update');
    Route::delete('commentaires/{id}', [CommentaireController::class, 'destroy'])->name('commentaires.destroy');
});

require __DIR__.'/auth.php';
