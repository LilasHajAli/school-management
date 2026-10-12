<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'joining_date' => fake()->date(),
        'certification' => fake()->randomElement([
            'Computer Science',
            'Information Technology',
            'Software Engineering',
        ]),
        'user_id' => \App\Models\User::factory(),
    ];
}
}
