<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'player_id' => Player::factory(),
            'group' => fake()->numberBetween(1, 3),
            'body' => fake()->paragraph(),
        ];
    }
}
