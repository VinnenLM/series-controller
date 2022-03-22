@extends('layout')

@section('titulo')
    Controle de Séries
@endsection

@section('cabecalho')
    Episódios
@endsection

@section('conteudo')

    <form action="" method="post">

        <ul class="list-group">
            @foreach ($episodios as $episodio)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{$episodio->nome}}
                    <input type="checkbox">
                </li>
            @endforeach
        </ul>

        <button class="btn btn-primary mt-3">Salvar</button>

    </form>

@endsection
