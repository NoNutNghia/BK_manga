<?php

use App\Http\Controllers\ChapterController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
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

Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('pages.user.manga.main');
})->name('main');

Route::get('/main', [MangaController::class, 'mangaCardList'])->name('main');

Route::get('/detail', [MangaController::class, 'mangaDetail'])->name('detail');

Route::get('/chapter', [ChapterController::class, 'chapterDetail'])->name('chapter');

Route::get('/genre', [GenreController::class, 'getGenre'])->name('genre');

Route::name('search.')->group(function () {
    Route::get('/search', [SearchController::class, 'index'])->name('index');
    Route::get('/advance', [SearchController::class, 'advance'])->name('advance');
    Route::post('/title', [SearchController::class, 'titleManga'])->name('title');
    Route::get('/filter', [SearchController::class, 'filterSearch'])->name('filter');
});

Route::get('/error', function () {
    return view('pages.user.error.not_found');
})->name('error');

Route::middleware('authorization')->group(function () {

    Route::post('/follow', [FollowController::class, 'followManga'])->name('follow');
    Route::post('/unfollow', [FollowController::class, 'unfollowManga'])->name('unfollow');
    Route::post('like', [LikeController::class, 'likeManga'])->name('like');
    Route::post('unlike', [LikeController::class, 'unlikeManga'])->name('unlike');

    Route::get('/following', [FollowController::class, 'index'])->name('following');

    Route::prefix('/personal')->name('personal.')->group(function () {
        Route::get('/information', [UserController::class, 'personalInformation'])->name('information');

        Route::get('/change_password', function () {
            return view('pages.user.personal.change_password');
        })->name('change_password');
    });
});
