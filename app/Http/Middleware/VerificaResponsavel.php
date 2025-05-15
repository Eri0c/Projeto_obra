<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class VerificaResponsavel
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
{
    //dd($request->route()); // Isso mostrará todos os parâmetros da rota
    if (!auth()->check()) {
        return redirect('/login')->with('error', 'Você precisa estar autenticado para acessar esta página.');
    }

    $user = auth()->user();

    // Permite acesso a lista de obras para Responsáveis e Colaboradores
    if ($request->routeIs('obras.index') && in_array($user->tipo, ['responsavel', 'colaborador'])) {
        return $next($request);
    }

    // Apenas Responsáveis podem acessar outras páginas de gerenciamento
    if ($user->tipo !== 'responsavel') {
        return redirect('/home')->with('error', 'Acesso negado. Somente responsáveis podem acessar esta página.');
    }

    return $next($request);
}

    
    
      

}

