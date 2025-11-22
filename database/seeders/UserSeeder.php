<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create(['name' => 'admin', 'phone' => '085163220401', 'email' => 'siagartjambi@gmail.com', 'role' => 'admin', 'status' => 'active', 'password' => 'admin123']);
        // // User::create(['name' => 'user1', 'phone' => '089625115936', 'email' => 'alinews120@gmail.com', 'role' => 'customer', 'status' => 'active', 'password' => 'user123']);
        // // Admin User
        User::create([
            'name' => 'Admin SiagaRT',
            'phone' => '085163220401',
            'email' => 'siagartjambi@gmail.com',
            'email_verified_at' => now(),
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);
        // Generate additional random users
        User::factory(10)->create();
    }
}