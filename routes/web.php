<?php

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

Route::get('/main', function () {
    return view('pages.user.manga.main');
})->name('main');

Route::get('/detail', function () {
    return view('pages.user.manga.detail');
})->name('detail');

Route::get('/chapter', function () {
    return view('pages.user.manga.chapter');
})->name('chapter');

Route::get('/following', function () {
    return view('pages.user.manga.following');
})->name('following');

Route::get('/search', function () {
    return view('pages.user.manga.search_manga');
})->name('search');

Route::get('/error', function () {
    return view('pages.user.error.not_found');
})->name('error');

Route::prefix('/personal')->middleware('authorization')->name('personal.')->group(function () {
    Route::get('/information', [UserController::class, 'personalInformation'])->name('information');

    Route::get('/change_password', function () {
        return view('pages.user.personal.change_password');
    })->name('change_password');
});
