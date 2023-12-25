<?php

namespace Database\Seeders;

use App\Models\AdminNotification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminNotification::factory()
        ->count(3)
        ->create();
    }
}
