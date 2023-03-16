@extends('template')

@section("content")

<section class="vh-100">
    <h3 style="color: black; text-align:center;">eCounter</h3>
    <div style="text-align:center;">
		<div class="btn-group" role="group">
            <button onclick="javascript:rota('/evento')" type="button" class="btn btn-success btn-lg" style="width:120px !important;"><img src="/img/note.png"><br>Eventos</button>
            <button onclick="javascript:rota('/logout')" type="button" class="btn btn-primary btn-lg" style="width:120px !important;"><img src="/img/Exit.png"><br>Sair</button>
		</div>

    </div>
	<hr>
    <div class="container-fluid">
    <div class="row">
        @foreach($listaDeEventos as $e)        
        <div class="col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2" style="background-color: #{{$e->cor}}!important;">
                <div class="card-header py-3" style="background-color: #{{$e->cor}}!important;">
                    <h5 class="m-0 font-weight-bold text-primary">{{$e->descricao}}</h5>
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
