<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Obras;

class ResponsavelController extends Controller
{
    // Método para gerenciar obras

    public function gerenciarObras()
    {
        $obras = Obras::where('responsavel_id', auth()->id())->get();

        return view('responsavel.gerenciar-obras', compact('obras'));
    }

    

    public function perfil()
    {
        return view('responsavel.perfil');
    }
}
