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
                {{$serie->nome}}
                <a href="/series/{{$serie->id}}/temporadas" class="btn btn-info"><i class="bi bi-box-arrow-up-right"></i></a>
                <form action="/series/{{$serie->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                </form>
            </li>
        @endforeach
    </ul>

@endsection
