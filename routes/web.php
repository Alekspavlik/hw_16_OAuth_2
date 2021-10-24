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


Route::get('/', [\App\Http\Controllers\AdsController::class, 'index'])->name('home');
Route::get('/{id}', [\App\Http\Controllers\AdsController::class, 'show'])->whereNumber('id')->name('ads.show');

Route::post('/login', [\App\Http\Controllers\UsersController::class, 'save']);
Route::get('/logout', [\App\Http\Controllers\UsersController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/edit/{ads?}', [\App\Http\Controllers\AdsController::class, 'create'])->middleware('auth')->name('ads.create');
Route::post('/edit/{ads?}', [\App\Http\Controllers\AdsController::class, 'save'])->middleware('auth');

Route::get('/delete/{ads}', [\App\Http\Controllers\AdsController::class, 'delete'])->middleware('auth')->name('ads.delete');






//Route::get('/private', [\App\Http\Controllers\AdsController::class, 'index'])->middleware('auth')->name('private');
//
//Route::match(['get', 'post'], 'ads/create', [\App\Http\Controllers\AdsController::class, 'form'])->middleware('auth');
//Route::match(['get', 'post'],'ads/edit/{id}', [\App\Http\Controllers\AdsController::class, 'form'])->middleware('auth');
//
//Route::get('/ads/delete/{id}', [\App\Http\Controllers\AdsController::class, 'delete'])->middleware('auth');
//
//
//Route::get('/login', [\App\Http\Controllers\UsersController::class, 'index'])->name('login');
//Route::post('/login', [\App\Http\Controllers\UsersController::class, 'save']);
//Route::get('/logout', [\App\Http\Controllers\UsersController::class, 'logout'])->name('logout');


