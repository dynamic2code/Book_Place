<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Book;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookLoans>
 */
class BookLoansFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $loanDate = fake()->dateTimeThisYear;
        $dueDate = fake()->dateTimeInInterval($loanDate, '+30 days');
        $returnDate = fake()->dateTimeInInterval($dueDate, '+7 days');

        return [
            'user_id' => User::factory(),
            'book_id' => Book::factory(),
            'loan_date' => $loanDate,
            'due_date' => $dueDate,
            'return_date' => $returnDate,
            'extended' => fake()->boolean(),
            'extension_date' => fake()->dateTimeThisMonth(),
            'penalty_amount' => fake()->randomFloat(2, 0, 100),
            'penalty_status' => fake()->randomElement(['pending', 'approved', 'none']),
            'status' => fake()->randomElement(['pending', 'approved', 'rejected']),
            'added_by' =>Admin::factory(),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
