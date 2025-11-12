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
        User::create(['name' => 'arfun', 'phone' => '089625115936', 'email' => 'arfun@gmail.com', 'role' => 'admin', 'status' => 'active', 'password' => 'admin']);
        User::create(['name' => 'yafie', 'phone' => '089625115936','email' => 'yafie@gmail.com', 'role' => 'customer', 'status' => 'active', 'password' => 'user']);
    }
}
