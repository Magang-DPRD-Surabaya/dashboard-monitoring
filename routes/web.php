<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MitraKerjaController;
use App\Http\Controllers\TahunAnggaranController;
use App\Http\Controllers\StatusCapaianController;
use App\Http\Controllers\KondisiLingkunganController;
use App\Http\Controllers\PendapatanController;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// Route CRUD Mitra Kerja
Route::resource('mitra-kerja', MitraKerjaController::class)
    ->middleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route CRUD Tahun Anggaran
Route::resource('tahun-anggaran', TahunAnggaranController::class)
    ->middleware(['auth']);

// Route CRUD Status Capaian
Route::resource('status-capaian', StatusCapaianController::class)
    ->middleware(['auth']);

// Route CRUD Kondisi Lingkungan
Route::resource('kondisi-lingkungan', KondisiLingkunganController::class)
    ->middleware(['auth']);

// Route CRUD Pendapatan
Route::resource('pendapatan', PendapatanController::class)
    ->middleware(['auth']);

require __DIR__.'/auth.php';
