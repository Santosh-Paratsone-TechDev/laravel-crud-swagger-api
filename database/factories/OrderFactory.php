<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'user_id' => \App\Models\User::factory(), // customer
            'total_amount' => fake()->randomFloat(2, 200, 10000),
            'status' => fake()->randomElement(['pending', 'paid', 'shipped', 'delivered']),
        ];
    }
}
