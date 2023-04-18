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
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminPage\Author\AuthorController;
use App\Http\Controllers\WebsitePage\History\HistoryController;


// Admin
Route::get('admin', function () { {
        return redirect()->route('admin.login');
    }
});
Route::match(['get', 'post'], 'admin/login', [UserController::class, 'login'])->name("admin.login");
Route::get('admin/logout', [UserController::class, 'logout'])->name('admin.logout');
Route::middleware('auth:admin')->prefix('admin')->group(function () {
    // User
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'get_list_users'])->name("admin.users.index");
        Route::post('delete/{id}', [UserController::class, 'destroy'])->name("admin.users.delete");
    });
    // Comic
    Route::prefix('comics')->group(function () {
        Route::get('/', [ComicController::class, 'get_list_comics'])->name("admin.comics.index");
        Route::match(['get', 'post'], 'create', [ComicController::class, 'create'])->name('admin.comics.create');
        Route::match(['get', 'post'], 'edit/{id}', [ComicController::class, 'edit'])->name('admin.comics.edit');
        Route::post('delete/{id}', [ComicController::class, 'destroy'])->name("admin.comics.delete");
    });
    // Author
    Route::prefix('authors')->group(function () {
        Route::get('/', [AuthorController::class, 'get_list_authors'])->name("admin.authors.index");
        Route::match(['get', 'post'], 'create', [AuthorController::class, 'create'])->name('admin.authors.create');
        Route::match(['get', 'post'], 'edit/{id}', [AuthorController::class, 'edit'])->name('admin.authors.edit');
        Route::post('delete/{id}', [AuthorController::class, 'destroy'])->name("admin.authors.delete");
    });
    // Genres
    Route::prefix('genres')->group(function () {
        Route::get('/', [GenresController::class, 'get_list_genres'])->name("admin.genres.index");
        Route::match(['get', 'post'], 'create', [GenresController::class, 'create'])->name('admin.genres.create');
        Route::match(['get', 'post'], 'edit/{id}', [GenresController::class, 'edit'])->name('admin.genres.edit');
        Route::post('delete/{id}', [GenresController::class, 'destroy'])->name("admin.genres.delete");
    });
    // Chapters
    Route::prefix('chapters')->group(function () {
        Route::get('/', [ChapterController::class, 'get_list_chapters'])->name("admin.chapters.index");
        Route::match(['get', 'post'], 'create', [ChapterController::class, 'create'])->name('admin.chapters.create');
        Route::match(['get', 'post'], 'edit/{id}', [ChapterController::class, 'edit'])->name('admin.chapters.edit');
        Route::post('delete/{id}', [ChapterController::class, 'destroy'])->name("admin.chapters.delete");
    });
});
// Customer
Route::group(['prefix' => '/'], function () {
    // Login
    Route::match(['get', 'post'], 'login', [CustomerController::class, 'login'])->name("login");
    // Register
    Route::match(['get', 'post'], 'register', [CustomerController::class, 'register'])->name("register");
    // Logout
    Route::get('/logout', [CustomerController::class, 'logout'])->name('logout');
    // Profile
    Route::get('/general', [CustomerController::class, 'general'])->name('general')->middleware('auth:web');
    Route::match(['get', 'post'], '/personal-information', [CustomerController::class, 'profile'])->name('profile')->middleware('auth:web');
    Route::get('/follow-comic', [CustomerController::class, 'comic_follow'])->name('comic-follow');
    Route::match(['get', 'post'], '/change-password', [CustomerController::class, 'change_password'])->name('change-password')->middleware('auth:web');
    // Home
    Route::get('/', [HomeController::class, 'get_list_comics_in_home'])->name("home");
    Route::get('search-comic', [HomeController::class, 'genre'])->name("genre");
    Route::get('search-comic/{slug}', [GenresController::class, 'show'])->name("genre_detail");
    // Theo dõi
    Route::get('/theo-doi', [HomeController::class, 'follow'])->name("follow");
    // Lịch sử
    Route::get('/lich-su', [HistoryController::class, 'get_list_histories'])->name("history");
    Route::post('/create_comic_history_by_session', [HistoryController::class, 'create_comic_history_by_session'])->name("create_comic_history_by_session");
    Route::delete('/remove_comic_history_by_session', [HistoryController::class, 'remove_comic_history_by_session'])->name('remove_comic_history_by_session');
    // Truyen comic detail
    Route::get('/comic/{slug}', [ComicController::class, 'show'])->name("comic");
    Route::get('/comic/{slug}/chap-{number}/{id}', [ChapterController::class, 'show'])->name("chapter");
});
