<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ColaboradorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
          if (!auth()-check() || auth()->user()->tipo !=='colaborador'){
            return redirect('/home')->with('error', 'Acesso permitido apenas para colaboradores ');
        }
        return $next($request);
    }
}
