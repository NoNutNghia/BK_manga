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
