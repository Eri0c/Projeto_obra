<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Obras;

class VerificaObraAcesso
{
    public function handle(Request $request, Closure $next): Response
    {
        //dd($request->route()); // Isso mostrará todos os parâmetros da rota
        $user = auth()->user();
        $obraId = $request->route('obra') ?? $request->route('id');

        // Verifica se o usuário é um Responsável (pode acessar todas as obras)
        if ($user->isResponsavel()) {
            return $next($request);
        }

        // Verifica se o usuário é um Colaborador e se está vinculado à obra
        if ($user->isColaborador() && $user->obras()->where('id', $obraId)->exists()) {
            return $next($request);
        }

        // Bloqueia o acesso caso não atenda aos critérios
        return redirect('/home')->with('error', 'Acesso negado. Você não tem permissão para acessar esta obra.');
    }
    


}


