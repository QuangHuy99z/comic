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
use App\Http\Controllers\GenresController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\UserController;

// Admin
Route::get('admin', function (){{
    return redirect()->route('admin.login');
}});
Route::match(['get', 'post'],'admin/login', [UserController::class, 'login'])->name("admin.login");
Route::get('/logout', [UserController::class, 'logout'])->name('admin.logout');
Route::middleware('auth:admin')->prefix('admin')->group(function () {
    // User
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name("admin.users.index");
        Route::post('delete/{id}', [UserController::class, 'destroy'])->name("admin.users.delete");
    });
    // Comic
    Route::prefix('comics')->group(function () {
        Route::get('/', [ComicController::class, 'index'])->name("admin.comics.index");
        Route::match(['get', 'post'], 'create', [ComicController::class, 'create'])->name('admin.comics.create');
        Route::match(['get', 'post'], 'edit/{id}', [ComicController::class, 'edit'])->name('admin.comics.edit');
        Route::post('delete/{id}', [ComicController::class, 'destroy'])->name("admin.comics.delete");
    });
    // Genres
    Route::prefix('genres')->group(function () {
        Route::get('/', [GenresController::class, 'index'])->name("admin.genres.index");
        Route::match(['get', 'post'], 'create', [GenresController::class, 'create'])->name('admin.genres.create');
        Route::match(['get', 'post'], 'edit/{id}', [GenresController::class, 'edit'])->name('admin.genres.edit');
        Route::post('delete/{id}', [GenresController::class, 'destroy'])->name("admin.genres.delete");
    });
    // Chapters
    Route::prefix('chapters')->group(function () {
        Route::get('/', [ChapterController::class, 'index'])->name("admin.chapters.index");
        Route::match(['get', 'post'], 'create', [ChapterController::class, 'create'])->name('admin.chapters.create');
        Route::match(['get', 'post'], 'edit/{id}', [ChapterController::class, 'edit'])->name('admin.chapters.edit');
        Route::post('delete/{id}', [ChapterController::class, 'destroy'])->name("admin.chapters.delete");
    });
});