@extends('template')

@section("content")
<h2>Nova conta</h2>
<form method="post" id="form" action="/usuario.save">
    @csrf
    
    <div class="form-group">
        <label for="login">Login</label>
        <input type="text" class="form-control" id="login" name="login" required autofocus>
    </div>
    <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" required >
    </div>
    <div style="text-align:center;">
        <div class="btn-group" role="group">
            <button type="submit" style="width: 120px !important;" class="btn btn-danger"><img src="/img/save.png"><br>Salvar</button>
            <button onclick="javascript:rota('/');" style="width: 120px !important;" type="button" class="btn btn-primary"><img src="/img/previous.png"><br>Voltar</button>
	</div>
    </div>
  </form>
  @endsection
