@extends('layout')

@push('styles')
    <link href="{{ asset('css/style-listar-series.css') }}" rel="stylesheet">
@endpush

@section('titulo')
    Controle de Séries
@endsection

@extends('header')

@section('conteudo')



    @if(!empty($mensagem))
        <div id="mensagem" class="alert alert-success">{{$mensagem}}</div>
    @endif

    <main class="container-principal">

        <h1>Listagem de Séries</h1>

    <a id="adicionar" href="/series/adicionar" class="btn btn-primary" role="button">Adicionar</a>

    <ul class="lista">
        @foreach ($series as $serie)
            <li class="item-lista">
                <span id="serie-{{$serie->id}}">{{$serie->nome}}</span>

                <div class="input-group w-50" hidden id="input-{{ $serie->id }}">
                    <input id="input-serie-{{ $serie->id }}" type="text" class="form-control" value="{{ $serie->nome }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" id="editar-serie" onclick="editarSerie({{ $serie->id }})">
                            <i class="bi bi-check2"></i>
                        </button>
                    </div>
                </div>
                @csrf

                <div class="botoes">
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

    </main>

    <script>
        function mostrarInput(serieId) {
            let inputSerie = $(`#input-${serieId}`);
            let nomeSerie = $(`#serie-${serieId}`);
            if (inputSerie.attr('hidden')) {
                inputSerie.removeAttr('hidden');
                nomeSerie.attr('hidden', true);
            } else {
                inputSerie.attr('hidden', true);
                nomeSerie.removeAttr('hidden');
            }
        }

        function editarSerie(serieId){
            let formData = new FormData();
            const nome = $(`#input-serie-${serieId}`).val();
            const token = $('input[name=_token]').val();
            formData.append('nome', nome);
            formData.append('_token', token);
            const url = `/series/${serieId}/editarSerie`;
            fetch(url, {
                method: 'POST',
                body: formData
            }).then(() => {
                mostrarInput(serieId);
                $(`#serie-${serieId}`).text(nome);
            });
        }
    </script>
    @include('bootstrapJs')

@endsection
