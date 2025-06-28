<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use Mews\Captcha\Captcha;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $artikels = \App\Models\Artikel::with('kategori', 'user')
        ->whereNotNull('published_at')
        ->orderByDesc('published_at')
        ->get();
    return view('welcome', compact('artikels'));
});

Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route untuk artikel dan kategori akan ditambahkan di sini
});

Route::get('captcha', function () {
    return captcha_img('flat');
});

Route::resource('kategori', App\Http\Controllers\KategoriController::class)->middleware(['auth', 'admin']);

Route::resource('artikel', App\Http\Controllers\ArtikelController::class)->middleware(['auth']);
Route::patch('artikel/{artikel}/publish', [App\Http\Controllers\ArtikelController::class, 'publish'])->name('artikel.publish')->middleware(['auth']);
Route::patch('artikel/{artikel}/unpublish', [App\Http\Controllers\ArtikelController::class, 'unpublish'])->name('artikel.unpublish')->middleware(['auth']);

require __DIR__.'/auth.php';
