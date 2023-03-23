<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\announcements>
 */
class announcementsFactory extends Factory
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
            'title' => $faker->sentence(),
            'description' => $faker->paragraph(),
            'senderID' => $faker->numberBetween(1, 10),
            'receiverID' => $faker->numberBetween(1, 10),
            'createdAt' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d H:i:s'),
            'updatedAt' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d H:i:s'),
        ];
    }
}
