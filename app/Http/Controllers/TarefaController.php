<?php

namespace App\Http\Controllers;

use App\Models\Tarefas;
use App\Models\Obras;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $tarefas = Tarefas::all();
        return view('tarefas', compact('tarefas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($obra_id)
    {   
        $obra = Obras::findOrFail($obra_id);
        return view('responsavel.criar-tarefas', compact('obra'));

    
     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validação de dados
        $request->validate([
            'titulo' => 'required|string|max:255',
            'comodo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'status' => 'required|string',
            'tipo' => 'required|string',
            'obra_id' => 'required|exists:obras,id' 
        ]);

        //Criar a tarefa no banco de dados

        Tarefas::create([
            'titulo' => $request->titulo,
            'comodo' => $request->comodo,
            'descricao' => $request->descricao,
            'status' => $request->status,
            'tipo' => $request->tipo,
            'obra_id' => $request->obra_id,
        ]);

        return redirect()->route('tarefas.index', $request->obra_id)->with('sucess', 'Tarefa Criada com sucesso.');
    }


    /**
     * Display the specified resource.
     */
    public function show(tarefas $tarefas)
    {
        //
        

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
