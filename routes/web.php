<?php

use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\ObraController;
use App\Http\Controllers\ResponsavelController;
use App\Http\Controllers\TarefaController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'));
Route::get('/home', fn() => view('home'))->name('home');


Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->isResponsavel()) {return redirect()->route('gerenciar-obras');}
    if ($user->isColaborador()) {
        $obra = $user->obras()->first();
        if (!$obra) {return view('colaborador.aguardando-vinculo');
    }
    if ($user->obras()->where('obras.id', $obra->id)->exists()){
            return redirect()->route('obras.show', ['id' => $obra->id]);

    }
}
    if ($user->isCliente()) {return redirect()->route('home');}
        
    return view('dashboard');

})->name('dashboard');

// Obras - listagem
Route::middleware(['auth'])->group(function () {
    Route::get('/obras', [ObraController::class, 'index'])->name('obras.index');
});

// Obras - detalhes
Route::middleware(['auth', 'verificaObraAcesso'])->group(function () {
    Route::get('/obras/{id}', [ObraController::class, 'show'])->name('obras.show');
});

Route::middleware(['auth'])->get('/obras', [ObraController::class, 'index'])->name('obras.index');

// Responsável - gerenciar
Route::middleware(['auth', 'responsavel'])->group(function () {
    Route::get('/gerenciar-obras', [ResponsavelController::class, 'gerenciarObras'])->name('gerenciar-obras');
    Route::get('obras/create', [ObraController::class, 'create'])->name('obras.create');
    Route::post('/obras', [ObraController::class, 'store'])->name('obras.store');
    Route::get('/perfil', [ResponsavelController::class, 'perfil']);

    Route::get('/obras/{obra}/colaboradores/adicionar', [ObraController::class, 'AdicionarColaboradorView'])
    ->name('obras.colaboradores.form');

    Route::post('/obras/{obra}/colaboradores/adicionar', [ObraController::class, 'adicionarColaboradorPorCodigo'])
    ->name('obras.colaboradores.adicionar');
});





// Página para o colaborador gerar o código manualmente
Route::middleware('auth')->get('/colaborador/gerar-codigo', function () {
    return view('colaborador.gerar-codigo');
})->name('colaborador.gerar-codigo.view');

// POST já existente para gerar o código
Route::post('/colaborador/gerar-codigo', [\App\Http\Controllers\ColaboradorController::class, 'gerarCodigoAutorizacao'])
    ->name('colaborador.gerar-codigo');

// Tarefas - criar e listar
Route::middleware(['auth'])->group(function () {
    Route::get('/obras/{obra}/tarefas/criar', [TarefaController::class, 'create'])->name('tarefas.create');
    Route::post('/obras/{obra}/tarefas', [TarefaController::class, 'store'])->name('tarefas.store');
    Route::get('/obras/{obra}/tarefas', [TarefaController::class, 'index'])->name('tarefas.index');
});
