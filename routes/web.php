<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AduanController;
use App\Http\Middleware\UpdateUserOnlineStatus;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/aduans', [AduanController::class, 'index'])->name('aduans.index');
Route::get('/aduans/create', [AduanController::class, 'create'])->name('aduans.create');
Route::post('/aduans', [AduanController::class, 'store'])->name('aduans.store');
Route::get('/aduans/{slug}', [AduanController::class, 'show'])->name('aduans.show');




