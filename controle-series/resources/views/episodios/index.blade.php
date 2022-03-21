@extends('layout')

@section('titulo')
    Controle de Séries
@endsection

@section('cabecalho')
    Episódios
@endsection

@section('conteudo')

    <ul class="list-group">
        @foreach ($episodios as $episodio)
            <li class="list-group-item">{{$episodio->nome}}</li>
        @endforeach
    </ul>

@endsection
