<?php

use Illuminate\Support\Facades\Route;

// =====================================================
// 🔧 IMPORT CONTROLLERS
// =====================================================
use App\Http\Controllers\Admin\AdminHasilController;
use App\Http\Controllers\Admin\AdminPesertaController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ExamResetController as AdminExamResetController;
use App\Http\Controllers\Admin\SoalController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Operator\DashboardController;
use App\Http\Controllers\Operator\UserController as OperatorUserController;
use App\Http\Controllers\Operator\QuestionController;
use App\Http\Controllers\Operator\PesertaController;
use App\Http\Controllers\Operator\ProfilController as OperatorProfilController;
use App\Http\Controllers\Peserta\DashboardController as PesertaDashboardController;
use App\Http\Controllers\Peserta\ExamResetController as PesertaExamResetController;
use App\Http\Controllers\Peserta\HasilController;
use App\Http\Controllers\Peserta\ProfilController as PesertaProfilController;
use App\Http\Controllers\Peserta\UjianController;
use App\Http\Controllers\Peserta\UjianUlangController;

// =====================================================
// 🌐 LANDING PAGE
// =====================================================
Route::get('/', fn() => view('landing'))->name('landing');

// =====================================================
// 👑 ADMIN AREA
// =====================================================
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {

        // 🏠 Dashboard Admin
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // 👥 Manajemen User
        Route::resource('users', UserController::class)->except(['show']);
        Route::put('/users/{user}/reset-password', [UserController::class, 'resetPassword'])->name('users.resetPassword');
        Route::put('/users/{id}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');

        // 👤 Manajemen Peserta
        Route::get('/peserta', [AdminPesertaController::class, 'index'])->name('peserta.index');
        Route::put('/peserta/{user}/reset-password', [AdminPesertaController::class, 'resetPassword'])->name('peserta.resetPassword');
        Route::delete('/peserta/{user}', [AdminPesertaController::class, 'destroy'])->name('peserta.destroy');

        // 🧠 Manajemen Soal
        Route::post('/soal/upload', [SoalController::class, 'upload'])->name('soal.upload');
        Route::get('/soal/export', [SoalController::class, 'export'])->name('soal.export');
        Route::delete('/soal/reset', [SoalController::class, 'reset'])->name('soal.reset');
        Route::resource('soal', SoalController::class)->except(['show']);

        // 📊 Hasil Ujian
        Route::get('/hasil', [AdminHasilController::class, 'index'])->name('hasil.index');
        Route::get('/hasil/pdf', [AdminHasilController::class, 'hasilPdf'])->name('hasil.pdf');
        Route::delete('/hasil/reset', [AdminHasilController::class, 'resetHasil'])->name('hasil.reset');
        Route::delete('/hasil/{id}', [AdminHasilController::class, 'destroy'])->name('hasil.destroy');

        // 🔄 Permintaan Reset Ujian
        Route::get('/exam-reset', [AdminExamResetController::class, 'index'])->name('exam-reset.index');
        Route::post('/exam-reset/{id}/approve', [AdminExamResetController::class, 'approve'])->name('exam-reset.approve');
        Route::post('/exam-reset/{id}/reject', [AdminExamResetController::class, 'reject'])->name('exam-reset.reject');
    });

// =====================================================
// 👑 OPERATOR AREA
// =====================================================
Route::middleware(['auth', 'role:operator'])
    ->prefix('operator')
    ->as('operator.')
    ->group(function () {

        // 📊 Dashboard
       Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // 👤 Profil Operator
        Route::prefix('profil')->as('profil.')->group(function () {
            Route::get('/', [OperatorProfilController::class, 'index'])->name('index');
            Route::post('/update', [OperatorProfilController::class, 'update'])->name('update');
           
        });

        // 👥 Peserta
        Route::get('/peserta', [PesertaController::class, 'index'])->name('peserta.index');
        Route::patch('/peserta/{id}/ubah-role', [PesertaController::class, 'ubahRole'])->name('peserta.ubahRole');

        // 📝 Manajemen Soal
        Route::resource('soal', QuestionController::class);
    });
// =====================================================
// 🧑‍🎓 PESERTA AREA
// =====================================================
Route::middleware(['auth', 'role:peserta'])
    ->prefix('peserta')
    ->as('peserta.')
    ->group(function () {

        // 🏠 Dashboard Peserta
        Route::get('/', [PesertaDashboardController::class, 'index'])->name('index');
        Route::get('/dashboard', [PesertaDashboardController::class, 'index'])->name('dashboard');
        Route::post('/request-reset', [PesertaDashboardController::class, 'requestReset'])->name('request.reset');

        // 🧩 Ujian
        Route::prefix('ujian')->as('ujian.')->group(function () {
            Route::get('/', [UjianController::class, 'index'])->name('index');
            Route::get('/pilih', [UjianController::class, 'pilih'])->name('pilih');
            Route::post('/mulai', [UjianController::class, 'mulai'])->name('mulai');
            Route::post('/mulai-baru', [UjianController::class, 'mulaiBaru'])->name('mulaiBaru');
            Route::get('/soal-ajax', [UjianController::class, 'showAjax'])->name('soal.ajax');
            Route::post('/save', [UjianController::class, 'saveAnswer'])->name('save');
            Route::post('/submit', [UjianController::class, 'submit'])->name('submit');
            Route::get('/cek-jawaban', [UjianController::class, 'cekJawaban'])->name('cekJawaban');
        });

        // 🧾 Hasil Ujian
        Route::prefix('hasil')->as('hasil.')->group(function () {
            Route::get('/', [HasilController::class, 'hasil'])->name('index');
            Route::get('/cetak', [HasilController::class, 'cetakPdf'])->name('cetak');
            Route::get('/selesai', [HasilController::class, 'cetakSelesai'])->name('selesai');
        });

        // 🔁 Ujian Ulang
        Route::prefix('ujian-ulang')->as('ujian-ulang.')->group(function () {
            Route::get('/form', [UjianUlangController::class, 'form'])->name('form');
            Route::post('/form', [UjianUlangController::class, 'store'])->name('store');
        });

        // 👤 Profil Peserta
        Route::prefix('profil')->as('profil.')->group(function () {
            Route::get('/', [PesertaProfilController::class, 'index'])->name('index');
            Route::post('/update', [PesertaProfilController::class, 'update'])->name('update');
            
        });
    });

// =====================================================
// 🚫 GUEST REDIRECT / 404 HANDLER
// =====================================================
Route::fallback(function () {
    if (!auth()->check()) {
        return redirect()->route('landing');
    }
    abort(404);
});

// =====================================================
// 🔐 AUTH ROUTES
// =====================================================
require __DIR__ . '/auth.php';
