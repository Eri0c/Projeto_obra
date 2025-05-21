<?php 

namespace App\Http\Controllers;
use Illuminate\Support\Str;



class ColaboradorController extends Controller{
    public function gerarCodigoAutorizacao()
{
    $user = auth()->user();

    $codigo = strtoupper(Str::random(8));

    $user->codigo_autorizacao = $codigo;
    $user->save();

    return redirect()->route('colaborador.gerar-codigo.view')->with('codigo', $codigo);

    }
}


