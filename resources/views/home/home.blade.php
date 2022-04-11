@extends('layout')

@push('styles')
    <link href="{{ asset('css/style-home.css') }}" rel="stylesheet">
@endpush

@section('titulo')
    Controle de Séries
@endsection

@section('conteudo')

    @include('header')

    <main class="container-principal">

        <div class="titulo">
            <h1>Listagem de Usuários</h1>
        </div>

        @if(!empty($mensagem))
            <div id="mensagem" class="alert alert-success">{{$mensagem}}</div>
        @endif

        <ul class="lista">
            @foreach ($users as $user)
                <li class="item-lista">
                    <span id="serie-{{$user->id}}">{{$user->name}}</span>

                    <div class="input-group w-50" hidden id="input-{{ $user->id }}">
                        <input id="input-serie-{{ $user->id }}" type="text" class="form-control"
                               value="{{ $user->name }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" id="editar-serie" onclick="editarSerie({{ $user->id }})">
                                <i class="bi bi-check2"></i>
                            </button>
                        </div>
                    </div>

                    <div class="botoes">
                        <button class="btn btn-link mr-1" onclick="mostrarSeries({{$user->id}})"><i
                                class="bi bi-chevron-down"></i></button>
                    </div>

                @foreach($user->series as $serie)
                    <li class="item-lista-lista user-{{$user->id}}"><a
                            href="/series/{{$serie->id}}/temporadas">{{$serie->nome}}</a></li>
                    @endforeach

                    </li>
                @endforeach
        </ul>
    </main>

    @include('bootstrapJs')

    <script>
        function mostrarSeries(userId) {
            var lista = $(`.user-${userId}`);
            if (lista.hasClass('visivel')) {
                lista.removeClass('visivel');
            } else {
                lista.addClass('visivel');
            }
        }
    </script>

@endsection
