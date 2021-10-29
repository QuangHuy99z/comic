<?php

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
use App\Http\Controllers\ComicController;
use App\Http\Controllers\DashboardController;


Route::prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name("admin.dasboard");
    // Comic
    Route::prefix('comics')->group(function () {
        Route::get('/', [ComicController::class, 'index'])->name("admin.comics.index");
        Route::get('create', [ComicController::class, 'create'])->name('admin.comics.create');
        Route::get('edit', [ComicController::class, 'edit'])->name('admin.comics.edit');
    });
    // Genres
    Route::prefix('genres')->group(function () {
        Route::get('/', [ComicController::class, 'index'])->name("admin.comics.index");
        Route::get('create', [ComicController::class, 'create'])->name('admin.comics.create');
        Route::get('edit', [ComicController::class, 'edit'])->name('admin.comics.edit');
    });
});