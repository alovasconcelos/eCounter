<?php

namespace App\Http\Controllers;

use App\Models\ContadorEvento;
use App\Models\Evento;
use App\Models\Usuario;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index(Request $req) {
        if (!$this->usuarioLogado()) {
            return redirect('/');
        }
        $usuario = session('ecUser');

        $listaDeEventos = Evento::where('usuario_id', $usuario->id)->get();
        $data = [
            'listaDeEventos' => $listaDeEventos
        ];

        return view('eventos.index')->with($data);
    }

    public function create(Request $req) {
        if (!$this->usuarioLogado()) {
            return redirect('/');
        }
        
        return view('eventos.create');
    }

    public function edit(Request $req) {
        if (!$this->usuarioLogado()) {
            return redirect('/');
        }
        $id = $req['id'];
        $evento = Evento::find($id);

        return view('eventos.edit')->with(['evento' => $evento]);

    }

    public function delete(Request $req) {
        if (!$this->usuarioLogado()) {
            return redirect('/');
        }
        $id = $req['id'];
        $evento = Evento::find($id);

        $evento->delete();
        return redirect('/evento');
    }

    public function save(Request $req) {
        if (!$this->usuarioLogado()) {
            return redirect('/');
        }
        $usuario = session('ecUser');

        $alteracao =  (isset($req['id']));
        if ($alteracao) {
            $e = Evento::find($req['id']);
        }else{
            $e = new Evento();
            $e->usuario_id = $usuario->id;            
        }
        $e->descricao = $req['descricao'];            
	$e->cor = substr($req['cor'],1);
        $e->save();
 
        return redirect('/evento');
    }

    public function inc (Request $req) {
        $idEvento = $req['id'];
        $ce = new ContadorEvento();
        $ce->evento_id = $idEvento;
        $ce->save();
        $qtd = ContadorEvento::where('evento_id', $idEvento)->count();
        return $qtd;
    }
    public function dec (Request $req) {
        $idEvento = $req['id'];
        $ce = ContadorEvento::where('evento_id', $idEvento)
						->latest('id')
						->first();
		if ($ce) {
			$ce->delete();
		}
        $qtd = ContadorEvento::where('evento_id', $idEvento)->count();
        return $qtd;
    }
}
