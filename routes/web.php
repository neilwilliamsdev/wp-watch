<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

Route::resource('sites', SiteController::class);
Route::get('/test-api/{site}', [SiteController::class, 'testApi']);
Route::get('/sites/{site}', [SiteController::class, 'apiShow']);