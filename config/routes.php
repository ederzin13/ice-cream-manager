<?php

use App\Controllers\AdminController;
use App\Controllers\ClientController;
use App\Controllers\LoginController;
use Core\Router\Route;

// Authentication
Route::get('/', [LoginController::class, 'index'])->name('root');
Route::post('/login', [LoginController::class, 'login'])->name('users.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('users.logout');

Route::middleware('admin')->group(function() {
    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware('client')->group(function() {
    Route::get('/client-dashboard', [ClientController::class, 'index'])->name('client.dashboard');
});
