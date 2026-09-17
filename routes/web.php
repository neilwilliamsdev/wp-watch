<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

Route::get('/sites', [SiteController::class, 'index'])->name('sites.index');
Route::get('/sites/create', [SiteController::class, 'create'])->name('sites.create');
Route::get('/sites/{site}', [SiteController::class, 'show'])->name('sites.show');
Route::get('/sites/{site}/edit', [SiteController::class, 'edit'])->name('sites.edit');
Route::put('/sites/{site}', [SiteController::class, 'update'])->name('sites.update');
Route::delete('/sites/{site}', [SiteController::class, 'destroy'])->name('sites.destroy');
Route::post('/sites', [SiteController::class, 'store'])->name('sites.store');
