<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;

Route::middleware(['auth'])->group(function () {
    Route::get('/obras/{obra}/tarefas/criar', [TarefaController::class, 'create'])->name('tarefas.create');
    Route::post('/obras/{obra}/tarefas', [TarefaController::class, 'store'])->name('tarefas.store');
    Route::get('/obras/{obra}/tarefas', [TarefaController::class, 'index'])->name('tarefas.index');
});
