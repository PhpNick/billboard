<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'region' => $this->faker->state(),
            'city' => $this->faker->city(),
            'street' => $this->faker->streetAddress(),
            'zip' => $this->faker->postcode(),
            'price' => $this->faker->numberBetween(10000, 5000000),
            'description' => $this->faker->paragraph(3),
        ];
    }
}
