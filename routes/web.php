<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('categories', CategoryController::class);
    Route::resource('annonces', AnnonceController::class);
    Route::get('/archive', [AnnonceController::class, 'archive'])->name('annonces.archive');
    Route::post('/annonces/{id}/restore', [AnnonceController::class, 'restore'])->name('annonces.restore');
    Route::delete('/annonces/{id}/force-delete', [AnnonceController::class, 'forceDelete'])->name('annonces.forceDelete');
    Route::get('/frontOffice/{annonce}', [HomeController::class, 'show'])->name('frontOffice.show');
    Route::post('/frontOffice/{id}/commentaires', [CommentaireController::class, 'store'])->name('commentaires.store');
    Route::delete('/commentaires/{id}', [CommentaireController::class, 'destroy'])->name('commentaires.destroy');

});

require __DIR__.'/auth.php';
