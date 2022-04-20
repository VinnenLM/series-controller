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

    public function testVerificarRotaEntrarPost()
    {
        $user = User::factory()->create();

        $response = $this->post('/entrar', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('/series');
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

    public function testVerificarRotaRegistrarPost()
    {
        $response = $this->post('/registrar', [
            'name' => 'Usuario Teste',
            'email' => 'teste@teste.com',
            'password' => '123',
            'password_confirmation' => '123',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('/series');
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
