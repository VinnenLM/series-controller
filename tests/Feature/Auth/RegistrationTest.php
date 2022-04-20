<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/registrar');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
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
