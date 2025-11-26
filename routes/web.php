<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;

Route::get('/', [UserController::class, 'home'])->name('home');

Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');

Route::get('/pages/about', [UserController::class, 'about'])->name('pages.about');
Route::get('/pages/services', [UserController::class, 'services'])->name('pages.services');