<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\classModel>
 */
class classModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'className' => $this->faker->word . ' Class',
            'studentsNumber' => $this->faker->numberBetween(5, 30),
        ];
    }
}
