<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageUploadController;

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
  Route::get('/', [HomeController::class, 'index'])->name('home');
  Route::get('/history', [HomeController::class, 'history'])->name('history');
});

// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Image Upload Route
Route::post('/upload', [ImageUploadController::class, 'upload']);
Route::view('/upload-form', 'upload');

// Modal
Route::get('/modal/content', function () {
  return view('modals.my_modal');
})->name('modal.content');

// Add gambar
Route::post('add-gambar', [ImageUploadController::class, 'addGambar'])->name('modals.add-gambar');
