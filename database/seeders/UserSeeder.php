<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Default Admin
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);

        // Default Vendor
        User::factory()->create([
            'name' => 'Vendor User',
            'email' => 'vendor@example.com',
            'role' => 'vendor',
            'password' => bcrypt('password'),
        ]);

        // Default Customer
        User::factory()->create([
            'name' => 'Customer User',
            'email' => 'customer@example.com',
            'role' => 'customer',
            'password' => bcrypt('password'),
        ]);

        // Additional random users
        User::factory()->count(10)->create();
    }
}