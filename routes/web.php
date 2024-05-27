<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\BoardsController; //追記
use App\Http\Controllers\FavoritesController; //追記

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BoardsController::class, 'index']);

Route::get('/dashboard', [BoardsController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('users', UsersController::class, ['only' => ['index', 'show']]);
    //Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('boards', BoardsController::class, ['only' => ['store', 'destroy']]);
});

Route::prefix('boards/{id}')->group(function () {
        Route::post('favorite', [FavoritesController::class, 'store'])->name('user.favorite');
        Route::delete('unfavorite', [FavoritesController::class, 'destroy'])->name('user.unfavorite');
        Route::get('favorites', [UsersController::class, 'favorites'])->name('users.favorites');
    });

require __DIR__.'/auth.php';