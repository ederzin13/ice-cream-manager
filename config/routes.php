<?php

use App\Controllers\LoginController;
use Core\Router\Route;

// Authentication
Route::get('/', [LoginController::class, 'index'])->name('root');
