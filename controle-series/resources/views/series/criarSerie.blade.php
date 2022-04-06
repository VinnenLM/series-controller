@extends('layout')

@push('styles')
    <link href="{{ asset('css/style-criar-serie.css') }}" rel="stylesheet">
@endpush

@section('titulo')
    Criar de Série
@endsection

@extends('header')

@section('conteudo')

    <h1>Criar Série</h1>

    <main class="container-principal">

    @if ($errors->any())
        <div class="alert alert-danger align-items-center">
            <ul class="mt-0 mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="/series/adicionar">
        @csrf
        <div class="row">
            <div class="col col-8">
                <label for="nome">Nome</label>
                <input class="form-control" type="text" name="nome" id="nome">
            </div>
            <div class="col col-2">
                <label for="qtd_temporadas">N° Temporadas</label>
                <input class="form-control" type="number" name="qtd_temporadas" id="qtd_temporadas">
            </div>
            <div class="col col-2">
                <label for="qtd_episodios">N° Episódios</label>
                <input class="form-control" type="number" name="qtd_episodios" id="qtd_episodios">
            </div>
        </div>
        <div class="botoes mt-2">
            <button class="btn btn-dark">Adicionar</button>
            <a href="/series" class="btn btn-primary" role="button">Voltar</a>
        </div>
    </form>

    </main>
@endsection
