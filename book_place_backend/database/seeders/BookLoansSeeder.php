<?php

namespace Database\Seeders;

use App\Models\BookLoans;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookLoansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookLoans::factory()
        ->count(70)
        ->create();
    }
}
