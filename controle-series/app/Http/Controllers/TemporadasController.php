<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function listarTemporadas(int $serieId)
    {
        $serie = Serie::find($serieId);
        $temporadas = $serie->temporadas;
        return view('temporadas/index', compact('serie', 'temporadas'));
    }
}
