<?php

use App\Http\Controllers\DashboardController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('t/{tenant}')->middleware('web')->group(function() {
    Route::get('/dashboard', DashboardController::class);
});

Route::get('/t/{tenant}/projects/test', function(){
    Project::create([
        'name' => now()->format('H:i:s')
    ]);
    return Project::all();
});
