<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entrepreneur>
 */
class EntrepreneurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'desc' => $this->faker->sentence(),
            'address' => $this->faker->streetAddress(),
            'no' => $this->faker->phoneNumber()
        ];
    }
}
