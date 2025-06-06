<?php 

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Obra;



class ColaboradorController extends Controller{
    public function index()
{
    $user = auth()->user();

    if ($user->isColaborador()) {
        $obras = $user->obras; 
        return view('colaborador.obras', compact('obras'));
    }

    abort(403, 'Acesso negado');
}

    
    public function gerarCodigoAutorizacao()
{
    $user = auth()->user();

    $codigo = strtoupper(Str::random(8));

    $user->codigo_autorizacao = $codigo;
    $user->save();

    return redirect()->route('colaborador.gerar-codigo.view')->with('codigo', $codigo);

    }
    
    public function gerenciarTarefas(){
        
    $obras = Obra::where('colaborador_id', auth()->id())->get();
    return view('colaborador.gerenciar-tarefas', compact('tarefas'));

    }

}


