<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MitraKerjaController;
use App\Http\Controllers\TahunAnggaranController;
use App\Http\Controllers\StatusCapaianController;
use App\Http\Controllers\KondisiLingkunganController;
use App\Http\Controllers\PendapatanController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\LaporanController;


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
    ->middleware(['auth', 'role:admin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route CRUD Tahun Anggaran
Route::resource('tahun-anggaran', TahunAnggaranController::class)
    ->middleware(['auth', 'role:admin']);

// Route CRUD Status Capaian
Route::resource('status-capaian', StatusCapaianController::class)
    ->middleware(['auth', 'role:admin']);

// Route CRUD Kondisi Lingkungan
Route::resource('kondisi-lingkungan', KondisiLingkunganController::class)
    ->middleware(['auth', 'role:admin']);

// Route CRUD Pendapatan
/**
 * Semua role bisa lihat data pendapatan
 */
Route::get('/pendapatan', [PendapatanController::class, 'index'])
    ->middleware(['auth'])
    ->name('pendapatan.index');

/**
 * Hanya admin yang bisa CRUD
 */
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/pendapatan/create', [PendapatanController::class, 'create'])
        ->name('pendapatan.create');

    Route::post('/pendapatan', [PendapatanController::class, 'store'])
        ->name('pendapatan.store');

    Route::get('/pendapatan/{id}/edit', [PendapatanController::class, 'edit'])
        ->name('pendapatan.edit');

    Route::put('/pendapatan/{id}', [PendapatanController::class, 'update'])
        ->name('pendapatan.update');

    Route::delete('/pendapatan/{id}', [PendapatanController::class, 'destroy'])
        ->name('pendapatan.destroy');
});

// Route Activity Log
Route::get('/activity-log', [ActivityLogController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('activity-log.index');

// Download laporan PDF
Route::get('/laporan/download', [LaporanController::class, 'download'])
    ->middleware(['auth'])
    ->name('laporan.download');

require __DIR__.'/auth.php';
