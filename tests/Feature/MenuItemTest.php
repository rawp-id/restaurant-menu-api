<?php

namespace Tests\Feature;

use App\Models\MenuItem;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MenuItemTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        $token = $user->createToken('test')->plainTextToken;

        $this->withHeader('Authorization', 'Bearer '.$token);
    }
    
    public function test_can_filter_menu_items_by_category()
    {
        $restaurant = Restaurant::factory()->create();

        MenuItem::factory()->create([
            'restaurant_id' => $restaurant->id,
            'category' => 'main',
        ]);

        $response = $this->getJson("/api/restaurants/{$restaurant->id}/menu_items?category=main");

        $response->assertStatus(200)
            ->assertJsonStructure(['data']);
    }

    public function test_can_search_menu_items()
    {
        $restaurant = Restaurant::factory()->create();

        MenuItem::factory()->create([
            'restaurant_id' => $restaurant->id,
            'name' => 'Nasi Goreng',
        ]);

        $response = $this->getJson("/api/restaurants/{$restaurant->id}/menu_items?search=nasi");

        $response->assertStatus(200);
    }

    public function test_create_restaurant_validation_error()
    {
        $response = $this->postJson('/api/restaurants', []);

        $response->assertStatus(422);
    }
}
