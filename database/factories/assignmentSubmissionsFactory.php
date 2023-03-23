<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\assignmentSubmissions>
 */
class assignmentSubmissionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        return [
            'grade' => $faker->numberBetween(0, 100),
            'submissionDate' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d H:i:s'),
            'submission' => $faker->paragraphs(3, true)
        ];
    }
}
