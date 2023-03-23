<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\attendance>
 */
class attendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'userID' => $this->faker->numberBetween(1, 10),
            'attendanceType' => $this->faker->randomElement(['Present', 'Late', 'Absent']),
            'date' => $this->faker->date(),
        ];
    }
}
