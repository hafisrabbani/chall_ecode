<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MahasiswaController;


Route::middleware('api')->group(function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('api.mahasiswa.index');
    Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'getDetail'])->name('api.mahasiswa.detail');
    Route::post('/mahasiswa/create', [MahasiswaController::class, 'created'])->name('api.mahasiswa.store');
    Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('api.mahasiswa.update');
    Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('api.mahasiswa.destroy');
});
