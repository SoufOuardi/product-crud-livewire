<?php

namespace Database\Factories;

use App\Models\Category;
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
        return [
            'name' => $this->faker->word(),
            'brand' => $this->faker->word(),
            'description' => $this->faker->sentence(12),
            'price' => $this->faker->numberBetween(19, 199), // Price between 10 and 1000
            'category_id' => Category::inRandomOrder()->first()->id,   // Stock quantity
        ];
    }
}
