<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_product_list_only_contains_active_products(): void
    {
        Product::create([
            'name' => 'Produk Aktif',
            'price' => 25000,
            'stock' => 3,
            'is_active' => true,
        ]);
        Product::create([
            'name' => 'Produk Nonaktif',
            'price' => 10000,
            'stock' => 0,
            'is_active' => false,
        ]);

        $this->getJson('/api/products')
            ->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.name', 'Produk Aktif');
    }

    public function test_public_product_detail_returns_404_for_inactive_products(): void
    {
        $product = Product::create([
            'name' => 'Produk Nonaktif',
            'price' => 10000,
            'stock' => 0,
            'is_active' => false,
        ]);

        $this->getJson("/api/products/{$product->id}")
            ->assertNotFound();
    }

    public function test_product_creation_requires_login_and_returns_json(): void
    {
        $payload = [
            'name' => 'Kopi Sabu',
            'category' => 'Minuman',
            'description' => 'Kopi lokal',
            'price' => 18000,
            'stock' => 12,
        ];

        $this->postJson('/api/products', $payload)
            ->assertUnauthorized();

        $this->actingAs(User::factory()->create())
            ->postJson('/api/products', $payload)
            ->assertCreated()
            ->assertJsonPath('name', 'Kopi Sabu')
            ->assertJsonPath('is_active', true);

        $this->assertDatabaseHas('products', ['name' => 'Kopi Sabu']);
    }

    public function test_authenticated_user_can_update_and_delete_a_product(): void
    {
        $product = Product::create([
            'name' => 'Produk Lama',
            'price' => 10000,
            'stock' => 5,
        ]);

        $this->actingAs(User::factory()->create())
            ->patchJson("/api/products/{$product->id}", ['price' => 12000])
            ->assertOk()
            ->assertJsonPath('price', '12000.00');

        $this->deleteJson("/api/products/{$product->id}")
            ->assertOk()
            ->assertJsonPath('message', 'Product deleted');

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    public function test_invalid_product_data_returns_validation_errors(): void
    {
        $this->actingAs(User::factory()->create())
            ->postJson('/api/products', ['name' => '', 'price' => -1])
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['name', 'price']);
    }
}
