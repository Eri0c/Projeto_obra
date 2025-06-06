<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColaboradorController;

Route::middleware('auth')->group(function () {
    Route::get('/colaborador/obras', [ColaboradorController::class, 'index'])->name('colaborador.obras');
    Route::get('/colaborador/gerar-codigo', function () {
        return view('colaborador.gerar-codigo');
    })->name('colaborador.gerar-codigo.view');

    Route::post('/colaborador/gerar-codigo', [ColaboradorController::class, 'gerarCodigoAutorizacao'])->name('colaborador.gerar-codigo');
});

