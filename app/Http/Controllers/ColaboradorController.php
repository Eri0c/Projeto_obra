<?php 

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Obra;



class ColaboradorController extends Controller{
    // metodo para criar codigo de autorização 
    public function gerarCodigoAutorizacao()
{
    $user = auth()->user();

    $codigo = strtoupper(Str::random(8));

    $user->codigo_autorizacao = $codigo;
    $user->save();

    return redirect()->route('colaborador.gerar-codigo.view')->with('codigo', $codigo);

    }
    // metodo para gerenciar tarefas
    public function gerenciarTarefas(){
        
    $obras = Obra::where('colaborador_id', auth()->id())->get();
    return view('colaborador.gerenciar-tarefas', compact('tarefas'));

    }

}


