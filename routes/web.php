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
  Route::post('/history/{id}', [HomeController::class, 'delete'])->name('history.delete');
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
  return view('modals.add_gambar');
})->name('modal.content');

// Add gambar
Route::post('add-gambar', [ImageUploadController::class, 'addGambar'])->name('modals.add-gambar');


Route::get('/debug-env', function () {
    $supabaseUrl = env('SUPABASE_URL');
    $supabaseBucket = env('SUPABASE_BUCKET');
    $filePath = 'your-file-path-here'; // Replace this with the actual file path or a test value

    $fullUrl = $supabaseUrl . '/storage/v1/object/' . $supabaseBucket . '/' . $filePath;

    return response()->json([
        'SUPABASE_URL' => $supabaseUrl,
        'SUPABASE_BUCKET' => $supabaseBucket,
        'Full_URL' => $fullUrl,
    ]);
});


// realll flask
Route::post('/upload1', [ImageUploadController::class, 'upload1']);
