<?php 
namespace App\Http\Controllers;

use App\Models\Obras;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ObraController extends Controller
{   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->tipo === 'responsavel') {
            // Busca todas as obras do responsável
            $obras = Obras::where('responsavel_id', $user->id)->get();
            return view('responsavel.gerenciar-obras',compact ('obras'));
            
            
        } elseif ($user->tipo === 'colaborador') {
            // Busca apenas as obras onde o colaborador está cadastrado
            $obras = Obras::whereHas('colaboradores', function ($query) use ($user) {
                $query->where('colaborador_id', $user->id);
            })->get();
            return view('colaborador.obras', compact('obras'));
        } else {
            // Redireciona qualquer outro tipo de usuário
            return redirect('/home')->with('error', 'Acesso não autorizado.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('responsavel.criar-obra');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:1000',
            'endereco' => 'required|string|max:255',
            'status' => 'required|string',
            'data_inicio' => 'required|date',
            'data_prevista_conclusao' => 'required|date',
        ]);

        $obra = new Obras();
        $obra->nome = $validated['nome'];
        $obra->descricao = $validated['descricao'];
        $obra->endereco = $validated['endereco'];
        $obra->data_inicio = $validated['data_inicio'];
        $obra->data_prevista_conclusao = $validated['data_prevista_conclusao'];
        $obra->responsavel_id = auth()->user()->id;
        $obra->codigo_acesso = Str::random(10);

        $obra->save();

        return redirect()->route('obras.index')->with('success', 'Obra criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $obra = Obras::findOrFail($id);

        if ($obra->responsavel_id != auth()->id()){
            abort(403, 'Você não tem permissão para visualizar esta obra');
        }

        return view('responsavel.obra-detalhes', compact('obra'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obras $obras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obras $obra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obras $obra)
    {
        //
    }
}
