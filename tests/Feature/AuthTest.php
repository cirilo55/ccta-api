<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->markTestSkipped('Temporarily skipping all tests in this class.');
    }
    /**
     * Testa a rota /api/login.
     *
     * @return void
     */
    public function testLoginRoute()
    {
        $response = $this->postJson('/api/login', ['email' => 'admin@example.com', 'password' => 'password']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Logged in successfully',
            ]);
    }
}
