<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function listarEpisodios(Temporada $temporada, Request $request)
    {
        $episodios = $temporada->episodios->sortBy('id');
        $temporadaId = $temporada->id;
        $mensagem = $request->session()->get('mensagem');
        return view('episodios/index', compact(  'episodios', 'temporadaId', 'mensagem'));
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
        $request->session()->flash('mensagem', 'Episódios marcados com sucesso!');

        return redirect()->back();

    }
}
