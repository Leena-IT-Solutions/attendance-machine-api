<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Seed User from Acme Industries
        User::updateOrCreate(
            ['email' => 'acme@example.com'],
            [
                'name' => 'Acme Industries Manager',
                'phone' => '+919876543210',
                'password' => Hash::make('acme123'),
                'role' => 'admin',
                'subscription_tier' => 'enterprise',
                'subscription_active' => true,
                'max_employees' => 100,
            ]
        );

        // 2. Seed User from Apex Logistics
        User::updateOrCreate(
            ['email' => 'apex@example.com'],
            [
                'name' => 'Apex Logistics Administrator',
                'phone' => '+919876543211',
                'password' => Hash::make('apex123'),
                'role' => 'admin',
                'subscription_tier' => 'pro',
                'subscription_active' => true,
                'max_employees' => 25,
            ]
        );

        // 3. Seed Leena Admin User
        User::updateOrCreate(
            ['email' => 'leena@example.com'],
            [
                'name' => 'Leena Admin',
                'phone' => '+919096189183',
                'password' => Hash::make('password'),
                'role' => 'super_admin',
                'subscription_tier' => 'enterprise',
                'subscription_active' => true,
                'max_employees' => 100,
            ]
        );
    }
}
