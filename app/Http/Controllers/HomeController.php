<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Evento;
use App\Models\ContadorEvento;
use Cookie;

class HomeController extends Controller
{
    public function index(Request $req) {
        // Verificar se o usuário está 'logado'
        if ($this->usuarioLogado()) {
            $usuario = session('ecUser');
        }else{
            return redirect('/login');
        }

        // Pegar a lista de eventos para passar para a página principal
        $listaDeEventos = Evento::where('Usuario_id', $usuario->id)
                                ->get();

        $dados = [
            'listaDeEventos' => $listaDeEventos
        ];

        return view('index')->with($dados);
    }

}
