<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController as GeneralDashboardController;


// ========================================
// HALAMAN UTAMA
// ========================================

Route::get('/', function () {
    return view('welcome');
});


// ========================================
// DASHBOARD UMUM
// Pengalihan berdasarkan role pengguna
// ========================================

Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->hasRole('Admin')) {
        return redirect()->route('admin.dashboard');
    }

    if ($user->hasRole('Dosen')) {
        return redirect()->route('dosen.dashboard');
    }

    if ($user->hasRole('Mahasiswa')) {
        return redirect()->route('mahasiswa.dashboard');
    }

    abort(403, 'Akun Anda belum memiliki role.');

})->middleware(['auth', 'verified'])->name('dashboard');


// ========================================
// DASHBOARD ADMIN
// ========================================

Route::middleware(['auth', 'verified', 'role:Admin'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

});

// ========================================
// DASHBOARD DOSEN
// ========================================

Route::middleware(['auth', 'verified', 'role:Dosen'])->group(function () {

    Route::get('/dosen/dashboard', [GeneralDashboardController::class, 'dosen'])
        ->name('dosen.dashboard');

});


// ========================================
// DASHBOARD MAHASISWA
// ========================================

Route::middleware(['auth', 'verified', 'role:Mahasiswa'])->group(function () {

    Route::get('/mahasiswa/dashboard', [GeneralDashboardController::class, 'mahasiswa'])
        ->name('mahasiswa.dashboard');

});


// ========================================
// CRUD MANAJEMEN BUKU
// ========================================

Route::middleware(['auth', 'verified'])->group(function () {

    // Melihat daftar buku
    Route::get('/books', [BookController::class, 'index'])
        ->middleware('permission:books.view')
        ->name('books.index');

    // Form tambah buku
    Route::get('/books/create', [BookController::class, 'create'])
        ->middleware('permission:books.create')
        ->name('books.create');

    // Menyimpan buku
    Route::post('/books', [BookController::class, 'store'])
        ->middleware('permission:books.create')
        ->name('books.store');

    // Form edit buku
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])
        ->middleware('permission:books.edit')
        ->name('books.edit');

    // Memperbarui buku
    Route::put('/books/{book}', [BookController::class, 'update'])
        ->middleware('permission:books.edit')
        ->name('books.update');

    // Menghapus buku
    Route::delete('/books/{book}', [BookController::class, 'destroy'])
        ->middleware('permission:books.delete')
        ->name('books.destroy');

    // Melihat detail buku
    Route::get('/books/{book}', [BookController::class, 'show'])
        ->middleware('permission:books.view')
        ->name('books.show');

});


// ========================================
// PENGATURAN PROFIL
// ========================================

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // ========================================
// MANAJEMEN KATEGORI - ADMIN
// ========================================

Route::middleware(['auth', 'verified', 'role:Admin'])->group(function () {

    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('categories.index');

    Route::get('/categories/create', [CategoryController::class, 'create'])
        ->name('categories.create');

    Route::post('/categories', [CategoryController::class, 'store'])
        ->name('categories.store');

    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])
        ->name('categories.edit');

    Route::put('/categories/{category}', [CategoryController::class, 'update'])
        ->name('categories.update');

    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
        ->name('categories.destroy');

});

});


// ========================================
// AUTHENTICATION BREEZE
// ========================================

require __DIR__.'/auth.php';
