<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company . ' Restaurant',
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'opening_hours' => '08:00 - 22:00',
        ];
    }
}
