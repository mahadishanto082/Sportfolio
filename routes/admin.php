<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MainPageController;
use App\Http\Controllers\Admin\TitlePageController;

use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\TechController;  
use App\Http\Controllers\Admin\HeaderContentController;
use App\Http\Controllers\Admin\FooterContentController;
use App\Http\Controllers\Admin\ContactMessageController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.submit');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth:admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'home'])->name('dashboard');
});

Route::resource('main-page', MainPageController::class);
Route::resource('title-page', TitlePageController::class);
Route::resource('services', ServicesController::class);
Route::resource('about', AboutController::class);
Route::resource('portfolio', PortfolioController::class);
Route::resource('packages',PackageController::class);
Route::resource('tech', TechController::class);
Route::resource('header-content', HeaderContentController::class);
Route::resource('contact', FooterContentController::class);

Route::resource('contact-message', ContactMessageController::class);
Route::delete('admin/contact-messages/{id}', [ContactMessageController::class, 'destroy'])
    ->name('admin.contact-message.destroy');
