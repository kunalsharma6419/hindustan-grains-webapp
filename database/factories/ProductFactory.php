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
            'original_price' => $this->faker->randomFloat(2, 1, 1000),
            'image' => $this->faker->imageUrl(),
            'short_description' => $this->faker->sentence,
            'long_description' => $this->faker->paragraph,
            'retailer_price'=>$this->faker->randomFloat(2, 1, 1000),
            'distributer_price'=>$this->faker->randomFloat(2, 1, 1000),
            'packs_quantity'=>$this->faker->numberBetween(1, 1000),
            'pack_ingredient_quantity'=>$this->faker->randomFloat(2, 1, 1000),
            'deleted_at' => null,
        ];
    }
}
