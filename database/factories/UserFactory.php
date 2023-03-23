<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fName' => $this->faker->firstName,
            'lName' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'DOB' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'phoneNumber' => $this->faker->phoneNumber,
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'role' => $this->faker->randomElement(['Student', 'Teacher', 'Admin']),
        ];
    }
}
