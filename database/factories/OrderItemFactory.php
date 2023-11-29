<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		$quantity = rand(1, 10);
		$product = Product::inRandomOrder()->first();

		return [
			'product_id' => $product->id,
			'quantity' => $quantity,
			'subtotal' => $product->price * $quantity,
		];
	}
}
