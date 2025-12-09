<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\ContactMessageController;



Route::get('/', [UserController::class, 'home'])->name('home');


Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');

Route::get('/pages/about', [UserController::class, 'about'])->name('pages.about');
Route::get('/pages/services', [UserController::class, 'services'])->name('pages.services');
Route::get('/pages/projects', [UserController::class, 'projects'])->name('pages.projects');
Route::get('/pages/contact', [UserController::class, 'contact'])->name('pages.contact');
// Contact Message Routes
Route::post('/contact-messages', [ContactMessageController::class, 'store'])->name('contact.store');
