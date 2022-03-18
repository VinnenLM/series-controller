<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function listarSeries(Request $request)
    {
        $series = Serie::all();
        $mensagem = $request->session()->get('mensagem');
        return view('series/index', compact('series', 'mensagem'));
    }

    public function criarSeries()
    {
        return view('series/create');
    }

    public function salvarSeries(SeriesFormRequest $request)
    {
        $serie = Serie::create(['nome' => $request->nome]);
        $qtdTemporadas = $request->qtd_temporadas;
        $qtdEpisodios = (int)$request->qtd_episodios;
            for($i=1;$i<=$qtdTemporadas;$i++){
                $temporada = $serie->temporadas()->create(['numero' => $i]);

                for($j=1;$j<=$qtdEpisodios;$j++){
                    $temporada->episodios()->create(['nome' => 'Episódio '.$j]);
                }
            }
        $request->session()->flash('mensagem', "Série {$serie->nome} criada com sucesso!");
        return redirect('/series');
    }

    public function excluirSeries(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()->flash('mensagem', "Série removida com sucesso!");
        return redirect('/series');
    }
}
