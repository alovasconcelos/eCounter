@extends('template')

@section("content")
    <h2>Eventos</h2>

    <div class="row">
        <div class="btn-group" role="group">
            <button onclick="javascript:rota('/');" type="button" class="btn btn-primary col-12 text-left"><i class="fas fa-home"></i> Voltar</button>
            <button class="btn btn-danger col-12 text-left" onclick='javascript:incluiEvento();'><i class="fas fa-plus-square"></i> Incluir</button>
        </div>
    </div>
    <div class="row">
        <table class="table table-sm" width="100%">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Descrição</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($listaDeEventos as $a)      
                <tr style="cursor: pointer;" onclick="javascript:editaEvento({{$a->id}});">
                    <td>{{$a->descricao}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        Nenhum evento cadastrado
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <script>
        function editaEvento(id) {
            var url = "/evento.edit." + id;
            document.location.href=url;
        }
        function incluiEvento() {
            var url = "/evento.create";
            document.location.href=url;
        }
    </script>
@endsection