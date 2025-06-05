<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObraController;

Route::middleware(['auth'])->group(function () {
    Route::get('/obras', [ObraController::class, 'index'])->name('obras.index');
});

Route::middleware(['auth', 'verificaObraAcesso'])->group(function () {
    Route::get('/obras/{id}', [ObraController::class, 'show'])->name('obras.show');
});
