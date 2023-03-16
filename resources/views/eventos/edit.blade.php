@extends('template')

@section("content")
    <h3 style="color: black; text-align:center;">eCounter</h3>
    <h3 style="text-align:center;">Alterar evento</h3>
<form method="post" id="form" action="/evento.save">
    @csrf
    <input type="hidden" id="id" name="id" value="{{$evento->id}}">
    
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" value="{{$evento->descricao}}">
    </div>
    <div class="form-group">
        <label for="cor">Cor</label>
        <input type="color" class="form-control" id="cor" name="cor" value="#{{$evento->cor}}">
    </div>
    <div style="text-align:center;">
        <div class="btn-group" role="group">
            <button type="submit" class="btn btn-danger"><img src="/img/save.png">Salvar</button>
            <button onclick="javascript:deleteEvento('{{$evento->id}}');" type="button" class="btn btn-warning"><img src="/img/delete.png">Excluir</button>
            <button onclick="javascript:rota('/evento');" type="button" class="btn btn-primary"><img src="/img/previous.png">Voltar</button>
        </div>

    </div>
  </form>
  @endsection
