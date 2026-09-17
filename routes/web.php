<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

Route::get('/sites', [SiteController::class, 'index']);
Route::get('/sites/create', [SiteController::class, 'create']);
Route::get('/sites/{site}', [SiteController::class, 'show'])->name('sites.show');
Route::post('/sites', [SiteController::class, 'store']);
