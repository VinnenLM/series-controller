<?php

namespace Tests\Unit;

use App\Models\Episodio;
use App\Models\Temporada;
use Tests\TestCase;

class TemporadaTest extends TestCase
{

    public function testVerificarEpisodiosAssistidos()
    {
        //instanciação das classes a serem utilizadas
        $temporada = new Temporada();
        $episodio1 = new Episodio();
        $episodio2 = new Episodio();
        $episodio3 = new Episodio();

        //Adicionados valores para as variaveis
        $episodio1->assistido = true;
        $this->assertTrue($episodio1->assistido);
        $episodio2->assistido = true;
        $this->assertTrue($episodio2->assistido);
        $episodio3->assistido = true;
        $this->assertTrue($episodio3->assistido);

        //Adicionados os episodios dentro da temporada
        $temporada->episodios->add($episodio1);
        $temporada->episodios->add($episodio2);
        $temporada->episodios->add($episodio3);

        //Verificando os asserções
        $episodiosAssistidos = $temporada->episodiosAssistidos();
        $this->assertCount(3, $episodiosAssistidos);
        foreach ($episodiosAssistidos as $episodio){
            $this->assertTrue($episodio->assistido);
        }
    }

}

/*$episodio2 = new Episodio();
$episodio1->assistido = true;
$episodio3 = new Episodio();
$episodio1->assistido = false;
$temporada->episodios->add($episodio1);
$temporada->episodios->add($episodio2);
$temporada->episodios->add($episodio3);


$episodiosAssistidos = $temporada->episodiosAssistidos();
$this->assertCount(2, $episodiosAssistidos);*/
