<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'product_name' => $this->faker->name(), 
            'price' => $this->faker->randomFloat(2, 10, 100), 
            'avatar' => 'https://picsum.photos/id/'.$this->faker->numberBetween($min = 1, $max = 1000).'/200/300',
            'description' => $this->faker->text(200),
        ];
    }
}
