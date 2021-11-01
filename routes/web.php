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


Route::middleware('auth')->group(function () {
Route::get('/{id}', [\App\Http\Controllers\AdsController::class, 'show'])->whereNumber('id')->name('ads.show');

Route::get('/logout', [\App\Http\Controllers\UsersController::class, 'logout'])->name('logout');

Route::get('/edit/{ads?}', [\App\Http\Controllers\AdsController::class, 'create'])->name('ads.create');
Route::post('/edit/{ads?}', [\App\Http\Controllers\AdsController::class, 'save']);

Route::get('/delete/{ads}', [\App\Http\Controllers\AdsController::class, 'delete'])->name('ads.delete');
});

Route::get('/', [\App\Http\Controllers\AdsController::class, 'index'])->name('home');
Route::post('/login', [\App\Http\Controllers\UsersController::class, 'save']);
Route::get('/callback', [\App\Http\Controllers\OauthController::class, 'callback']);

