<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Shift;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShiftManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_shifts(): void
    {
        $user = User::factory()->create();
        $shift = Shift::create([
            'user_id' => $user->id,
            'name' => 'Morning Shift',
            'start_time' => '08:00',
            'end_time' => '17:00',
        ]);

        $response = $this
            ->actingAs($user, 'sanctum')
            ->getJson('/api/shifts');

        $response
            ->assertOk()
            ->assertJson([
                'status' => 'success',
                'shifts' => [
                    [
                        'id' => $shift->id,
                        'name' => 'Morning Shift',
                        'start_time' => '08:00',
                        'end_time' => '17:00',
                    ]
                ]
            ]);
    }

    public function test_can_create_shift(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user, 'sanctum')
            ->postJson('/api/shifts', [
                'name' => 'Night Shift',
                'start_time' => '22:00',
                'end_time' => '06:00',
            ]);

        $response
            ->assertOk()
            ->assertJson([
                'status' => 'success',
                'message' => 'Shift created successfully',
                'shift' => [
                    'name' => 'Night Shift',
                    'start_time' => '22:00',
                    'end_time' => '06:00',
                ]
            ]);

        $this->assertDatabaseHas('shifts', [
            'user_id' => $user->id,
            'name' => 'Night Shift',
        ]);
    }

    public function test_can_update_shift(): void
    {
        $user = User::factory()->create();
        $shift = Shift::create([
            'user_id' => $user->id,
            'name' => 'Evening Shift',
            'start_time' => '14:00',
            'end_time' => '22:00',
        ]);

        $response = $this
            ->actingAs($user, 'sanctum')
            ->patchJson("/api/shifts/{$shift->id}", [
                'name' => 'Evening Shift Updated',
                'start_time' => '15:00',
            ]);

        $response
            ->assertOk()
            ->assertJson([
                'status' => 'success',
                'shift' => [
                    'id' => $shift->id,
                    'name' => 'Evening Shift Updated',
                    'start_time' => '15:00',
                    'end_time' => '22:00',
                ]
            ]);
    }

    public function test_cannot_update_others_shift(): void
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        
        $shift = Shift::create([
            'user_id' => $user2->id,
            'name' => 'Other User Shift',
            'start_time' => '09:00',
            'end_time' => '17:00',
        ]);

        $response = $this
            ->actingAs($user1, 'sanctum')
            ->patchJson("/api/shifts/{$shift->id}", [
                'name' => 'Stolen Shift',
            ]);

        $response->assertStatus(403);
    }

    public function test_can_delete_shift(): void
    {
        $user = User::factory()->create();
        $shift = Shift::create([
            'user_id' => $user->id,
            'name' => 'Temporary Shift',
            'start_time' => '09:00',
            'end_time' => '17:00',
        ]);

        $response = $this
            ->actingAs($user, 'sanctum')
            ->deleteJson("/api/shifts/{$shift->id}");

        $response
            ->assertOk()
            ->assertJson([
                'status' => 'success',
                'message' => 'Shift deleted successfully',
            ]);

        $this->assertDatabaseMissing('shifts', ['id' => $shift->id]);
    }

    public function test_attendance_pdf_report_respects_employee_shift(): void
    {
        $user = User::factory()->create();
        $shift = Shift::create([
            'user_id' => $user->id,
            'name' => 'Late Shift',
            'start_time' => '10:00:00',
            'end_time' => '19:00:00',
        ]);

        $employee = \App\Models\Employee::create([
            'user_id' => $user->id,
            'name' => 'Edward Late',
            'code' => 'EMP300',
            'shift_id' => $shift->id,
            'face_signature' => ['straight' => array_fill(0, 512, 0.1)]
        ]);

        // Create attendance record at 09:45 AM (which is early for a 10:00 AM shift)
        \App\Models\AttendanceRecord::create([
            'user_id' => $user->id,
            'employee_code' => 'EMP300',
            'employee_name' => 'Edward Late',
            'scan_date' => '2026-06-04',
            'scan_time' => '09:45:00',
        ]);

        // Calculate late minutes via helper
        $records = \App\Models\AttendanceRecord::where('employee_code', 'EMP300')->get();
        
        $employee->load('shift');
        $shiftStart = $employee->shift ? $employee->shift->start_time : '07:30:00';
        $lateMin = \App\Helpers\AttendanceReportHelper::calculateLateMinutes($records->first()->scan_time, $shiftStart);

        // Assert late minutes is 0, since 09:45 is before 10:00
        $this->assertEquals(0, $lateMin);

        // Now check a punch at 10:15 AM (which is 15 minutes late)
        $lateMin2 = \App\Helpers\AttendanceReportHelper::calculateLateMinutes('10:15:00', $shiftStart);
        $this->assertEquals(15, $lateMin2);
    }
}
