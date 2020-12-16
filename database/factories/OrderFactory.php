<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::all()->random()->id,
            'status' =>  $this->faker->numberBetween($min = 1, $max = 3),
            'total_price'=> $this->faker->numberBetween($min = 1000, $max = 9000),
            'created_day' =>  $this->faker->dateTime($max = 'now', $timezone = null),
        ];
    }
}
