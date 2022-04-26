<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CadastroUsuarioTest extends TestCase
{

    use RefreshDatabase;

    public function testUsuarioCadastradoLogar()
    {
        $user = User::factory()->create();

        $response = $this->post('/entrar', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('/series');
    }

    public function testUsuarioNaoCadastradoLogar()
    {
        $user = User::factory()->create();

        $this->post('/entrar', [
            'email' => $user->email,
            'password' => 'password-errado',
        ]);

        $this->assertGuest();
    }

    public function testVerificarRegristroUsuario()
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

}
