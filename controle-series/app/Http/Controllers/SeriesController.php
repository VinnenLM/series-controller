<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episodio;
use App\Models\Serie;
use App\Models\Temporada;
use App\Models\User;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{
    public function listarSeries(Request $request)
    {

        $series = Serie::all()->where('user_id', Auth::id())->sortDesc();
        $mensagem = $request->session()->get('mensagem');
        return view('series/listarSeries', compact('series', 'mensagem'));
    }

    public function criarSeries()
    {
        return view('series/criarSerie');
    }

    public function salvarSeries(SeriesFormRequest $request, CriadorDeSerie $criadorDeSerie)
    {
        $serie = $criadorDeSerie->criarSerie($request->nome, $request->qtd_temporadas, $request->qtd_episodios);
        $request->session()->flash('mensagem', "Série {$serie->nome} criada com sucesso!");
        return redirect('/series');
    }

    public function excluirSeries(Request $request, RemovedorDeSerie $removedorDeSerie)
    {
        $serieNome = $removedorDeSerie->removerSerie($request->id);
        $request->session()->flash('mensagem', "Série $serieNome removida com sucesso!");
        return redirect('/series');
    }

    public function editarSerie($id, Request $request)
    {
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }

    public function listarUsuarios(Request $request)
    {
        $users = User::all();
        $series = Serie::all()->where('user_id', Auth::id())->sortDesc();
        $mensagem = $request->session()->get('mensagem');
        return view('home/home', compact('users', 'series', 'mensagem'));
    }
}
