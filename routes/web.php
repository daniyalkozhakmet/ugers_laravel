<?php

use App\Http\Controllers\ClaimController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/claim/create', [ClaimController::class, 'index'])->name('claim_index')->middleware('auth');

Route::get('/claim/search', [ClaimController::class, 'search'])->name('claim_search')->middleware('auth');
Route::post('/claim/create', [ClaimController::class, 'store'])->name('claim_store')->middleware('auth');

Route::get('/claim/{id}', [ClaimController::class, 'get_by_id'])->name('claim_get_by_id')->middleware('auth');
Route::get('/profile', [ClaimController::class, 'profile'])->name('profile');

//edit
Route::get('/claim/edit/{id}', [ClaimController::class, 'edit_show'])->name('claim_edit')->middleware('auth');
Route::post('/claim/edit/{id}', [ClaimController::class, 'edit'])->name('claim_edit_store')->middleware('auth');

Route::get('/file', [FileController::class, 'test']);
