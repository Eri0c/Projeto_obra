<?php 
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Obra;
use App\Models\colaborador;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ObraController extends Controller
{   

    public function adicionarColaboradorView($obraId)
{
    $obra = Obra::findOrFail($obraId);

    return view('obras.adicionar-colaborador', compact('obra'));
}

   public function adicionarColaboradorPorCodigo(Request $request, Obra $obra)
{
    $request->validate([
        'codigo_autorizacao' => 'required|string',
    ]);

    $colaborador = User::where('codigo_autorizacao', $request->codigo_autorizacao)->first();

    if (!$colaborador) {
        return back()->withErrors(['codigo_autorizacao' => 'Código inválido']);
    }

    // Verficando se o colaborador ainda nao esta vinculado a obra.
    if (!$obra->colaboradores->contains($colaborador->id)){
        $obra->colaboradores()->attach($colaborador->id);
    }

    //Limpar código usado
    $colaborador->codigo_autorizacao = null;
    $colaborador->save();

    return back()->with('success', 'Colaborador vinculado com sucesso!');
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->tipo === 'responsavel') {
            // Busca todas as obras do responsável
            $obras = Obra::where('responsavel_id', $user->id)->get();
            return view('responsavel.gerenciar-obras',compact('obras'));
            
            
        } elseif ($user->tipo === 'colaborador') {
            //Busca apenas as obras onde o colaborador está cadastrado
            $obras = Obra::whereHas('colaboradores', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->get();
            return view('colaborador.obras', compact('obras'));
        } else {
            //redireciona qualquer outro tipo de usuário
            return redirect('/home')->with('error', 'Acesso não autorizado.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Exibe formulario para a criação de obras
        return view('obras.create');
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

        $obra = new Obra();
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
        $obra = Obra::findOrFail($id);
        $user = auth()->user();



      if ($user->isColaborador()) {
        // Verifica se o colaborador está vinculado à obra
        if ($user->obras->contains('id', $obra->id)) {
            return view('colaborador.obras',['obras' => collect([$obra])]);
        }

        // Caso não esteja vinculado a nenhuma obra, mostra a view aguardando
        if ($user->obras()->count() == 0) {
            return view('colaborador.aguardando-vinculo');
        }
        abort(403, 'Você não tem permissão para visualizar esta obra');
    }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obra $obras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obra $obra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obra $obra)
    {
        //
    }
}
