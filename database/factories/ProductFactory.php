<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		$date = now()->subDays(rand(0, 30));

		return [
			'name' => fake()->word(),
			'description' => fake()->sentence(),
			'price' => fake()->randomFloat(0, 5, 30) * 1000,
			'created_at' => now()->subDays(rand(0, 30)),
		];
	}
}
