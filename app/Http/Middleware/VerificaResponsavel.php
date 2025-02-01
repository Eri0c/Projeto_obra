<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificaResponsavel
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica se o usuário está autenticado e se é um responsável
        if (auth()->check() && auth()->user()->isResponsavel()) {
            return $next($request); // Permite a requisição seguir adiante
        }

        return redirect('/home')->with('error', 'Acesso negado, você precisa ser responsável para acessar essa página.');
    
    }
      

}
