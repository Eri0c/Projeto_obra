<?php

use App\Http\Controllers\ObraController;
use App\Http\Controllers\ResponsavelController;
use App\Http\Controllers\TarefaController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'));
Route::get('/home', fn() => view('home'))->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
});

// Obras - listagem
Route::middleware(['auth'])->group(function () {
    Route::get('/obras', [ObraController::class, 'index'])->name('obras.index');
});

// Obras - detalhes
Route::middleware(['auth', 'verificaObraAcesso'])->group(function () {
    Route::get('/obras/{id}', [ObraController::class, 'show'])->name('obras.show');
});

// Responsável - gerenciar
Route::middleware(['auth', 'verificaResponsavel'])->group(function () {
    Route::get('/gerenciar-obras', [ResponsavelController::class, 'gerenciarObras'])->name('gerenciar-obras');
    Route::get('/perfil', [ResponsavelController::class, 'perfil']);
    Route::get('/responsavel/criar-obra', [ObraController::class, 'create'])->name('obras.create');
    Route::resource('obras', ObraController::class)->except(['index', 'show']);
});

// Tarefas - criar e listar
Route::middleware(['auth'])->group(function () {
    Route::get('/obras/{obra}/tarefas/criar', [TarefaController::class, 'create'])->name('tarefas.create');
    Route::post('/obras/{obra}/tarefas', [TarefaController::class, 'store'])->name('tarefas.store');
    Route::get('/obras/{obra}/tarefas', [TarefaController::class, 'index'])->name('tarefas.index');
});
?>