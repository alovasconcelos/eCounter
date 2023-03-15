<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function create(Request $req) {
        return view('usuarios.create');
    }

    public function save(Request $req) {
        $e = new Usuario();
        $e->login = $req['login'];            
        $e->senha = md5($req['senha']);            
        $e->save();
 
        return redirect('/login');
    }
}
