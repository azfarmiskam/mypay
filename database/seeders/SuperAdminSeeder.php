<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create SuperAdmin user
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@mypay.com',
            'password' => Hash::make('superadmin123'),
            'role' => 'superadmin',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        // Create additional Admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@mypay.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);
    }
}
