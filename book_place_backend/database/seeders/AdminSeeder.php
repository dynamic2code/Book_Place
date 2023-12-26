<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::factory()
        ->count(3)
        ->create();
        $admin = Admin::factory()->state([
            'email' => 'your_desired_email@example.com',
            'password' => bcrypt('your_desired_password'),
        ])->create();
    }
}
