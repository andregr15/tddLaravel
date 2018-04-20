<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomeResponseStatus()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testDatabaseUsers()
    {
        factory(\App\User::class)->create([
            'email'=>'teste@teste.com.br'
        ]);

        $this->assertDatabaseHas('users', [
            'email'=>'teste@teste.com.br'
        ]);
    }

    public function testAuthentication(){
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get('/home');

        $response->assertStatus(200);
    }
}
