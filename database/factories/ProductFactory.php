<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
   protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'quantity' => $this->faker->numberBetween(1, 100),
            'original_price' => $this->faker->randomFloat(2, 1, 1000),
            'selling_price' => $this->faker->randomFloat(2, 1, 1000),
            'image' => $this->faker->imageUrl(),
            'short_description' => $this->faker->sentence,
            'long_description' => $this->faker->paragraph,
            'deleted_at' => null,
        ];
    }
}
