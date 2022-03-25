<?php

namespace App\Services;

use App\Models\Serie;
use App\Models\Temporada;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    public function criarSerie(string $nomeSerie, int $qtdTemporadas, int $qtdEpisodios): Serie
    {
        //DB::transaction(function () use ($nomeSerie, $qtdTemporadas, $qtdEpisodios, &$serie){
        DB::beginTransaction();
        $serie = Serie::create(['nome' => $nomeSerie, 'users_id' => Auth::id()]);
        $this->criarTemporada($qtdTemporadas, $qtdEpisodios, $serie);
        DB::commit();
        //});

        return $serie;
    }

    public function criarTemporada(int $qtdTemporadas, int $qtdEpisodios, Serie $serie)
    {
        for($i=1;$i<=$qtdTemporadas;$i++){
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            $this->criarEpisodio($qtdEpisodios, $temporada);
        }
    }

    public function criarEpisodio(int $qtdEpisodios, Temporada $temporada)
    {
        for($j=1;$j<=$qtdEpisodios;$j++){
            $temporada->episodios()->create(['nome' => 'Episódio '.$j]);
        }
    }
}
