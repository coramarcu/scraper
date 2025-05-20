<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScraperController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', ScraperController::class)->name('home');

require __DIR__.'/auth.php';
