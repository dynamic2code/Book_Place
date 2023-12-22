<?php

namespace Database\Factories;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'added_by' => Admin::factory(),
            'name' => fake()->word(),
            'publisher' => fake()->company(),
            'isbn' => fake()->isbn13(),
            'category' => fake()->word(),
            'sub_category' => fake()->word(),
            'description' => fake()->paragraph(),
            'pages' => fake()->numberBetween(50, 1000),
            'image' => fake()->imageUrl(),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'updated_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'deleted_at' => null,
        ];
    }
}
