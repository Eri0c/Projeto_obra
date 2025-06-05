<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\ObraController;
use App\Http\Controllers\ResponsavelController;
use App\Http\Controllers\TarefaController;

Route::get('/', fn() => view('welcome'));
Route::get('/home', fn() => view('home'))->name('home');

Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->isResponsavel()) {
        return redirect()->route('gerenciar-obras');
    }

    if ($user->isColaborador()) {
        $obra = $user->obras()->first();
        if (!$obra) {
            return view('colaborador.aguardando-vinculo');
        }

        if ($user->obras()->where('obras.id', $obra->id)->exists()) {
            return redirect()->route('obras.show', ['id' => $obra->id]);
        }
    }

    if ($user->isCliente()) {
        return redirect()->route('home');
    }

    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// 👇 Inclui os outros arquivos de rotas
require __DIR__.'/responsavel.php';
require __DIR__.'/colaborador.php';
require __DIR__.'/obras.php';
require __DIR__.'/tarefas.php';
