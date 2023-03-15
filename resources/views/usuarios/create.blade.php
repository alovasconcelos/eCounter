@extends('template')

@section("content")
<h2>Nova conta</h2>
<form method="post" id="form" action="/usuario.save">
    @csrf
    
    <div class="form-group">
        <label for="login">Login</label>
        <input type="text" class="form-control" id="login" name="login" autofocus>
    </div>
    <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha">
    </div>
    <div class="btn-group" role="group">
        <button type="submit" class="btn btn-danger col-12 text-left"><i class="fas fa-save"></i> Salvar</button>
    </div>
  </form>
  @endsection
