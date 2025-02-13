<?php

use App\Http\Controllers\ObraController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResponsavelController;
use App\Http\Controllers\TarefaController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('obras', ObraController::class);

Route::middleware(['verificaResponsavel'])->group(function () {
    Route::get('/gerenciar-obras', [ResponsavelController::class, 'gerenciarObras'])->name('gerenciarObras');
    Route::get('/perfil', [ResponsavelController::class, 'perfil']);

    Route::get('/responsavel/criar-obra', [ObraController::class, 'create'])->name('obras.create');
});

Route::middleware(['auth'])->group(function (){
    Route::get('/obras/{obras}/tarefas/criar', [TarefaController::class, 'create']) ->name('tarefas.create');
    Route::post('/obras/{obras}/tarefas', [TarefaController::class, 'store'])->name('tarefas.store');
});









