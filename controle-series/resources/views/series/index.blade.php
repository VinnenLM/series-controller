@extends('layout')

@section('titulo')
    Controle de Séries
@endsection

@section('cabecalho')
    Séries
@endsection

@section('conteudo')

    @if(!empty($mensagem))
        <div id="mensagem" class="alert alert-success">{{$mensagem}}</div>
    @endif

    <a href="/series/adicionar" class="btn btn-dark mb-3" role="button">Adicionar</a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span id="serie-{{$serie->id}}">{{$serie->nome}}</span>

                <div class="input-group w-50" hidden id="input-serie-{{ $serie->id }}">
                    <input type="text" class="form-control" value="{{ $serie->nome }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" id="editar-serie" onclick="editarSerie({{ $serie->id }})">
                            <i class="bi bi-check2"></i>
                        </button>
                        @csrf
                    </div>
                </div>

                <div class="d-flex">
                    <button class="btn btn-success mr-1" onclick="mostrarInput({{$serie->id}})"><i
                            class="bi bi-pencil-square"></i></button>
                    <a href="/series/{{$serie->id}}/temporadas" class="btn btn-info mr-1"><i
                            class="bi bi-box-arrow-up-right"></i></a>
                    <form action="/series/{{$serie->id}}" method="post">

                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    <script>
        function mostrarInput(serieId) {
            var inputSerie = $(`#input-serie-${serieId}`);
            var nomeSerie = $(`#serie-${serieId}`);
            if (inputSerie.attr('hidden')) {
                inputSerie.removeAttr('hidden');
                nomeSerie.attr('hidden', true);
            } else {
                inputSerie.attr('hidden', true);
                nomeSerie.removeAttr('hidden');
            }
        }
    </script>

@endsection
