<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Shift;
use App\Models\User;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Get or create a tenant user (Acme Industries)
        $user = User::where('email', 'acme@example.com')->first();
        if (!$user) {
            $user = User::first();
        }

        // 2. Create sample shifts for the user
        $morningShift = Shift::firstOrCreate(
            ['user_id' => $user->id, 'name' => 'General Morning'],
            ['start_time' => '09:00:00', 'end_time' => '17:00:00']
        );

        $eveningShift = Shift::firstOrCreate(
            ['user_id' => $user->id, 'name' => 'Evening Shift'],
            ['start_time' => '17:00:00', 'end_time' => '01:00:00']
        );

        $shifts = [$morningShift->id, $eveningShift->id];

        // 3. Define 10 Indian employee records
        $names = [
            'Arjun Mehta',
            'Priya Sharma',
            'Rohan Gupta',
            'Deepa Nair',
            'Amit Patel',
            'Sneha Reddy',
            'Vikram Singh',
            'Anjali Verma',
            'Rajesh Joshi',
            'Kiran Rao'
        ];

        // Dummy 512-float vector signature for face biometrics
        $dummySignature = array_fill(0, 512, 0.0);

        foreach ($names as $index => $name) {
            $code = 'EMP-' . str_pad(101 + $index, 3, '0', STR_PAD_LEFT);
            
            Employee::updateOrCreate(
                ['code' => $code],
                [
                    'user_id' => $user->id,
                    'shift_id' => $shifts[$index % 2],
                    'name' => $name,
                    'face_signature' => $dummySignature,
                    'photo' => null
                ]
            );
        }
    }
}
