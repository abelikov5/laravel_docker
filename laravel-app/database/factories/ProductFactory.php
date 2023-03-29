<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->city,
            'code' => $this->faker->word(5),
            'color' => $this->faker->colorName,
            'price' => random_int(50, 10000),
            'size' => $this->faker->numberBetween(20, 70),
            'description' => $this->faker->text(200),

            //
        ];
    }
}
