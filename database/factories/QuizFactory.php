<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question' => $this->faker->sentence(mt_rand(2,8)),
            'category_id' => Category::factory(),
            'optionA' => $this->faker->word(),
            'optionB' => $this->faker->word(),
            'optionC' => $this->faker->word(),
            'optionD' => $this->faker->word(),
            'correctAnswer' => $this->faker->randomElement(['optionA','optionB','optionC','optionD']),
        ];
    }
}
