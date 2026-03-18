<?php

namespace Tests\Feature;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RestaurantTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_restaurants()
    {
        $user = User::factory()->create();
        $token = $user->createToken('test')->plainTextToken;

        Restaurant::factory()->count(2)->create();

        $response = $this->withHeader('Authorization', 'Bearer '.$token)->getJson('/api/restaurants');

        $response->assertStatus(200)
            ->assertJsonStructure(['data']);
    }

    public function test_can_create_restaurant()
    {
        $user = User::factory()->create();
        $token = $user->createToken('test')->plainTextToken;

        $response = $this->withHeader('Authorization', 'Bearer '.$token)
            ->postJson('/api/restaurants', [
                'name' => 'Test Resto',
                'address' => 'Jakarta',
            ]);

        $response->assertStatus(201)
            ->assertJsonStructure(['data']);
    }
}
