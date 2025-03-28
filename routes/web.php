<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::get("/series", [SeriesController::class, "index"]);
Route::get("/series/create", [SeriesController::class, "create"]);
Route::post("/series/store", [SeriesController::class, "store"]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
