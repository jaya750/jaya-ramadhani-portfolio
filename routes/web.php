<?php

use App\Http\Controllers\PortofolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortofolioController::class, 'home'])->name('home');

Route::get('/proyek/{slug}', [PortofolioController::class, 'proyek'])
    ->where('slug', '[a-z0-9-]+')
    ->name('proyek.show');