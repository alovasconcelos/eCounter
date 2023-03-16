@extends('template')

@section("content")

<section class="vh-100">
    <h1 style="color: black; text-align:center;">eCounter</h1>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <img src="/img/logo.png" width="120" style="margin-top: -16px;"/>
            </div>
		<div class="btn-group" role="group">
            <button onclick="javascript:rota('/evento')" type="button" class="btn btn-success btn-lg" style="width:100px !important;"><img src="/img/note.png"><br>Eventos</button>
            <button onclick="javascript:rota('/logout')" type="button" class="btn btn-success btn-lg" style="width:100px !important;"><img src="/img/Exit.png"><br>Sair</button>
		</div>

        </div>
    </nav>
	<hr>
    <div class="container-fluid">
    <div class="row">
        @foreach($listaDeEventos as $e)        
        <div class="col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2" style="background-color: #{{$e->cor}}!important;">
                <div class="card-header py-3" style="background-color: #{{$e->cor}}!important;">
                    <h2 class="m-0 font-weight-bold text-primary">{{$e->descricao}}</h2>
                </div>
                <div class="card-body">
                    <table width="100%">
                        <tr>
                            <td>
                                <img id="btnUp{{$e->id}}" style="cursor: pointer;" src="/img/up.png" onclick="javascript:up('{{$e->id}}');">
                            </td>
                            <td>
                                <h1><span id="sp{{$e->id}}" class="counter">{{$e->qtd()}}</h1></span>
                            </td>
                            <td>
                                <img id="btnDown{{$e->id}}" style="cursor: pointer;" src="/img/down.png" onclick="javascript:down('{{$e->id}}');">
                            </td>
                        </tr>
                    </table>                    
                </div>
            </div>
        </div>

        @endforeach
    </div>
    </div>
</section>
@endsection
@section("script")            
    $('.counter').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
            }, {
            duration: 2000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
@endsection
