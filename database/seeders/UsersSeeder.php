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
                'role' => 'user',
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
                'role' => 'user',
                'subscription_tier' => 'pro',
                'subscription_active' => true,
                'max_employees' => 25,
            ]
        );

        // 3. Seed Sandeep Rathod Admin User (Project Guideline)
        User::updateOrCreate(
            ['email' => 'sandeep198558@gmail.com'],
            [
                'name' => 'Sandeep Rathod',
                'phone' => '9664588677',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'subscription_tier' => 'enterprise',
                'subscription_active' => true,
                'max_employees' => 100,
            ]
        );

        // 4. Seed Leena Adam Admin User (Project Guideline)
        User::updateOrCreate(
            ['email' => 'leenaadam28@gmail.com'],
            [
                'name' => 'Leena Adam',
                'phone' => '9769409405',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'subscription_tier' => 'enterprise',
                'subscription_active' => true,
                'max_employees' => 100,
            ]
        );

        // 5. Seed Leena Admin User (Legacy testing account)
        User::updateOrCreate(
            ['email' => 'leena@example.com'],
            [
                'name' => 'Leena Admin',
                'phone' => '+919096189183',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'subscription_tier' => 'enterprise',
                'subscription_active' => true,
                'max_employees' => 100,
            ]
        );
    }
}
