<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('t/{tenant}')->middleware('web')->group(function() {
    Route::get('/dashboard', DashboardController::class);
});
