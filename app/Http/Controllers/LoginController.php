<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function login(Request $req) {
        return view('login');
    }

    public function validaLogin(Request $req) {
        $login = $req['ec_login'];
        $senha = $req['ec_senha'];

        $usuario = Usuario::firstWhere('Login', $login);
        if ($usuario == null || $usuario->senha != md5($senha)) {
            return redirect()->back()->with('err', 'Acesso não autorizado.');
        }
        session(['ecUser' => $usuario]);

        return redirect('/');
    }

    public function logout(Request $req) {
        $req->session()->forget(['ecUser']);
        return redirect('/');
    }
}
