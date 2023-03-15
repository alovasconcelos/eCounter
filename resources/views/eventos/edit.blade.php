@extends('template')

@section("content")
<h2>Alteração de evento</h2>
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
    <div class="btn-group" role="group">
    <button type="submit" class="btn btn-danger col-12 text-left"><i class="fas fa-save"></i> Salvar</button>
    <button onclick="javascript:deleteEvento('{{$evento->id}}');" type="button" class="btn btn-warning col-12 text-left"><i class="fas fa-delete"></i> Excluir</button>
    <button onclick="javascript:rota('/evento');" type="button" class="btn btn-primary col-12 text-left"><i class="fas fa-home"></i> Voltar</button>
    </div>
  </form>
  @endsection
