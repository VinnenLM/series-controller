@extends('layout')

@section('titulo')
    Controle de Séries
@endsection

@section('cabecalho')
    Episódios
@endsection

@section('conteudo')

    @if(!empty($mensagem))
    <div class="alert alert-success">
        {{$mensagem}}
    </div>
    @endif

    <form action="/temporadas/{{ $temporadaId }}/episodios/assistidos" method="post">
        @csrf
        <ul class="list-group">
            @foreach ($episodios as $episodio)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{$episodio->nome}}
                    <input type="checkbox" name="episodios[]" value="{{ $episodio->id }}" {{$episodio->assistido ? 'checked' : ''}}>
                </li>
            @endforeach
        </ul>

        <button class="btn btn-primary mt-3">Salvar</button>

    </form>

@endsection
