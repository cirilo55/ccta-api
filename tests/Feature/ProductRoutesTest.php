<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductRoutesTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();

        $this->markTestSkipped('Temporarily skipping all tests in this class.');
    }
    public function testIndex()
    {
        $response = $this->get(route('products.index'));

        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $productData = [
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 100,
            // Adicione outros campos necessários aqui
        ];

        $response = $this->postJson(route('products.store'), $productData);

        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'name',
                'description',
                'price',
                // Adicione outros campos necessários aqui
            ]);
    }

    public function testShow()
    {
        $product = Product::factory()->create();

        $response = $this->get(route('products.show', $product->id));

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'description',
                'price',
                // Adicione outros campos necessários aqui
            ]);
    }

    public function testUpdate()
    {
        $product = Product::factory()->create();

        $updateData = [
            'name' => 'Updated Product',
            'description' => 'Updated Description',
            'price' => 200,
            // Adicione outros campos necessários aqui
        ];

        $response = $this->putJson(route('products.update', $product->id), $updateData);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'description',
                'price',
                // Adicione outros campos necessários aqui
            ]);
    }

    public function testDestroy()
    {
        $product = Product::factory()->create();

        $response = $this->delete(route('products.destroy', $product->id));

        $response->assertStatus(200);
    }
}
