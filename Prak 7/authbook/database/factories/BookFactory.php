<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'isbn' => fake()->unique()->isbn13(),
            'title' => fake()->sentence(3),
            'author_id' => Author::inRandomOrder()->first()?->id ?? Author::factory(),
            'publisher' => fake()->company(),
            'year' => fake()->numberBetween(1990, 2025),
            'cover' => null,
            'status' => fake()->randomElement(['available', 'borrowed']),
            'description' => fake()->paragraph(),
        ];
    }
}