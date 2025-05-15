<?php

namespace App\Http\Controllers;

use App\Models\Tarefas;
use App\Models\Obras;
use App\Models\comodos;
use App\Models\TipoTarefa;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($obra_id)
    {
        //
        $obra = Obras::with('tarefas')->findOrFail($obra_id);
        return view('responsavel.lista-tarefas', compact('obra'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($obra_id)
    {
        $obra = Obras::findOrFail($obra_id);
        $comodos = Comodos::all();
        $tipos_tarefas = TipoTarefa::all();

        return view('responsavel.criar-tarefas', compact('obra', 'comodos', 'tipos_tarefas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validação de dados
    $request->validate([
        'titulo' => 'required|string|max:255',
        'comodo' => 'required|string|max:255',
        'descricao' => 'required|string',
        'status' => 'required|in:em andamento,concluída,em espera',
        'seleciona_tarefa' =>'required_without:nova_tarefa|string',
        'nova_tarefa' => 'nullable|string|max:255',
        'novo_comodo' => 'nullable|string|max:255',
        'obra_id' => 'required|exists:obras,id'
    ]);

    // Criar ou pegar cômodo
    if ($request->filled('novo_comodo')) {
        $comodo = Comodos::firstOrCreate(['nome' => $request->input('novo_comodo')]);
    } else {
        $comodo = Comodos::where('nome', $request->input('comodo'))->first();
    }

    // Criar ou pegar tipo de tarefa (aqui já pode ser mais de um, vou considerar só um pra exemplo)
    if ($request->filled('nova_tarefa')) {
        $tipo_tarefa = TipoTarefa::firstOrCreate(['nome' => $request->input('nova_tarefa')]);
    } else {
        $tipo_tarefa = TipoTarefa::where('nome', $request->input('seleciona_tarefa'))->first();
    }

    // Criar a tarefa sem tipo_tarefa_id
    $tarefa = new Tarefas();
    $tarefa->obra_id = $request->input('obra_id');
    $tarefa->colaborador_id = auth()->user()->id;
    $tarefa->titulo = $request->input('titulo');
    $tarefa->comodo = $comodo->nome;
    $tarefa->descricao = $request->input('descricao');
    $tarefa->status = $request->input('status');
    $tarefa->data_inicio = now();

    $tarefa->save();

    // Associar os tipos via relacionamento muitos-para-muitos
    $tarefa->tiposTarefas()->sync([$tipo_tarefa->id]);

    return redirect()->route('obras.show', $tarefa->obra_id)->with('success', 'Tarefa criada com sucesso!');
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tarefas $tarefas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tarefas $tarefas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tarefas $tarefas)
    {
        //
    }
}
