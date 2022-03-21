<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function listarEpisodios(int $serieId, int $temporadaId)
    {
        $serie = Serie::find($serieId);
        $temporada = Temporada::find($temporadaId);
        $episodios = $temporada->episodios;
        return view('episodios/index', compact('serie', 'temporada', 'episodios'));
    }
}
