<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RotasTest extends TestCase
{

    use RefreshDatabase;

    public function testVerificarRota()
    {
        $response = $this->get('/');

        if(\Illuminate\Support\Facades\Auth::check()){
            $response->assertRedirect('/series');
        }else{
            $response->assertRedirect('/entrar');
        }

    }

    public function testVerificarRotaEntrarGet()
    {
        $response = $this->get('/entrar');

        $response->assertStatus(200);
    }

    public function testVerificarRotaSair()
    {
        $response = $this->get('/sair');

        $response->assertRedirect('/entrar');

    }

    public function testVerificarRotaRegistrarGet()
    {
        $response = $this->get('/registrar');

        $response->assertStatus(200);
    }


    public function testVerificarRotaSeries()
    {
        $response = $this->get('/entrar');

        $response->assertStatus(200);
    }

    public function testVerificarRotaTemporadas()
    {
        $response = $this->get('/entrar');

        $response->assertStatus(200);
    }

    public function testVerificarRotaEpisodios()
    {
        $response = $this->get('/entrar');

        $response->assertStatus(200);
    }

}
