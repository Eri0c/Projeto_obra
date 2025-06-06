<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObraController;
use App\Http\Controllers\ResponsavelController;

Route::middleware(['auth', 'responsavel'])->group(function () {
    Route::get('/gerenciar-obras', [ResponsavelController::class, 'gerenciarObras'])->name('gerenciar-obras');
    Route::get('/obras/create', [ObraController::class, 'create'])->name('obras.create');
    Route::post('/obras', [ObraController::class, 'store'])->name('obras.store');
    Route::get('/perfil', [ResponsavelController::class, 'perfil']);
    Route::get('/obras/{obra}/colaboradores/adicionar', [ObraController::class, 'AdicionarColaboradorView'])->name('obras.colaboradores.form');
    Route::post('/obras/{obra}/colaboradores/adicionar', [ObraController::class, 'adicionarColaboradorPorCodigo'])->name('obras.colaboradores.adicionar');
});
