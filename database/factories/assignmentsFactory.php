<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\assignments>
 */
class assignmentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'grade' => $this->faker->numberBetween(0, 100),
            'dueDate' => $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d H:i:s'),
        ];
    }
}
