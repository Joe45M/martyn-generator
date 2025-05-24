<?php

use App\Http\Middleware\AdminMiddleware;
use App\Livewire\Admin\AdminDashboard;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware(['auth', 'verified', AdminMiddleware::class])
    ->name('admin.')
    ->group(function () {
        Route::get('/', AdminDashboard::class)
            ->middleware(AdminMiddleware::class)
            ->name('dashboard');
    });
