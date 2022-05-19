<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
            'title' => $this->faker->sentence(),
            'region' => $this->faker->state(),
            'city' => $this->faker->city(),
            'street' => $this->faker->streetAddress(),
            'zip' => $this->faker->postcode(),
            'price' => $this->faker->numberBetween(10000, 5000000),
            'description' => $this->faker->paragraph(3),
            'user_id' => User::factory()->create()->id
        ];
    }
}
