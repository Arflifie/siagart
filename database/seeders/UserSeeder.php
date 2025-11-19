<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(['name' => 'admin', 'phone' => '085163220401', 'email' => 'siagartjambi@gmail.com', 'role' => 'admin', 'status' => 'active', 'password' => 'admin123']);
        // User::create(['name' => 'user1', 'phone' => '089625115936', 'email' => 'alinews120@gmail.com', 'role' => 'customer', 'status' => 'active', 'password' => 'user123']);
    }
}
