@extends('layout')

@section('titulo')
    Controle de Séries
@endsection

@section('cabecalho')
    Temporadas de {{$serie->nome}}
@endsection

@section('conteudo')

    <ul class="list-group">
        @foreach ($temporadas as $temporada)
            <li class="list-group-item"><a href="/series/{{$temporada->serie_id}}/temporadas/{{$temporada->id}}/episodios">Temporada {{$temporada->numero}}</a></li>
        @endforeach
    </ul>

@endsection
