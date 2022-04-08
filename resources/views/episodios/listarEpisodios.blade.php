@extends('layout')

@push('styles')
    <link href="{{ secure_asset('css/style-episodio.css') }}" rel="stylesheet">
@endpush

@section('titulo')
    Episódios
@endsection

@extends('header')

@section('conteudo')

    <main class="container-principal">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/series">Home</a></li>
                <li class="breadcrumb-item"><a href="/series/{{$temporada->serie_id}}/temporadas">Temporadas</a></li>
                <li class="breadcrumb-item ativo" aria-current="page">Episódios</li>
            </ol>
        </nav>

        <div class="titulo">
            <h1>{{$temporada->nome}} - Episódios</h1>
        </div>

        @if(!empty($mensagem))
            <div class="alert alert-success">
                {{$mensagem}}
            </div>
        @endif

        <form action="/temporadas/{{ $temporada->id }}/episodios/assistidos" method="post">
            @csrf
            <button class="btn btn-success mt-3">Salvar</button>

            <ul class="lista">
                @foreach ($episodios as $episodio)
                    <li class="item-lista">
                        <span class="ml-3">{{$episodio->nome}}</span>
                        <input class="mr-3" type="checkbox" name="episodios[]"
                               value="{{ $episodio->id }}" {{$episodio->assistido ? 'checked' : ''}}>
                    </li>
                @endforeach
            </ul>

        </form>

    </main>

@endsection
