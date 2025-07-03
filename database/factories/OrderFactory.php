<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'house_no' => $this->faker->numberBetween(1, 100),
            'road_no' => $this->faker->numberBetween(1, 50),
            'phone_no' => $this->faker->phoneNumber(),
            'amount' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
