<?php

namespace Database\Factories;

use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => \App\Models\Order::all()->random()->id,
            'product_id' =>  \App\Models\Product::all()->random()->id,
            'amount'=> $this->faker->numberBetween($min = 1, $max = 10),
        
        ];
    }
}
