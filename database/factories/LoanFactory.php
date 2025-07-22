<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => Book::inRandomOrder()->first()->id ?? Book::factory(),
            'member_id' => Member::inRandomOrder()->first()->id ?? Member::factory(),
            'due_at' => now()->addDays(rand(1, 30)),
            'returned_at' => null,
        ];
    }
}
