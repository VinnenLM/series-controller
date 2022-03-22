<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function listarEpisodios(Temporada $temporada)
    {
        $episodios = $temporada->episodios->sortBy('id');
        $temporadaId = $temporada->id;
        return view('episodios/index', compact(  'episodios', 'temporadaId'));
    }

    public function assistidos(Temporada $temporada, Request $request)
    {
        $episodiosAssistidos = $request->episodios;
        $temporada->episodios->each(function (Episodio $episodio)
        use ($episodiosAssistidos)
        {
            $episodio->assistido = in_array(
                $episodio->id,
                $episodiosAssistidos
            );
        });

        $temporada->push();

        return redirect()->back();

    }
}
