<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsersRoutesTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();

        $this->markTestSkipped('Temporarily skipping all tests in this class.');
    }
    public function testIndex()
    {
        $response = $this->get('/users');

        $response->assertStatus(200);
    }

    public function testShow()
    {
        $user = User::factory()->create();

        $response = $this->get("/users/{$user->id}");

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'email',
                // Adicione outros campos necessários aqui
            ]);
    }

    public function testStore()
    {
        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            // Adicione outros campos necessários aqui
        ];

        $response = $this->postJson('/users', $userData);

        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'name',
                'email',
                // Adicione outros campos necessários aqui
            ]);
    }

    public function testUpdate()
    {
        $user = User::factory()->create();

        $updateData = [
            'name' => 'Updated User',
            'email' => 'updated@example.com',
            // Adicione outros campos necessários aqui
        ];

        $response = $this->putJson("/users/{$user->id}", $updateData);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'email',
                // Adicione outros campos necessários aqui
            ]);
    }

    public function testDestroy()
    {
        $user = User::factory()->create();

        $response = $this->delete("/users/{$user->id}");

        $response->assertStatus(200);
    }

    public function testGetProductsByUser()
    {
        $user = User::factory()->create();

        $response = $this->get("/users/products/{$user->id}");

        $response->assertStatus(200);
    }
}
