<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Employee;
use App\Models\AttendanceRecord;
use App\Exports\AttendanceExport;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

class AttendanceReportTest extends TestCase
{
    use RefreshDatabase;

    public function test_attendance_export_can_be_instantiated_and_generated()
    {
        // 1. Create a user
        $user = User::factory()->create([
            'month_start_date' => 1,
        ]);

        // 2. Create some employees
        Employee::create([
            'user_id' => $user->id,
            'name' => 'Alice Dev',
            'code' => 'EMP001',
        ]);
        Employee::create([
            'user_id' => $user->id,
            'name' => 'Bob Manager',
            'code' => 'EMP002',
        ]);

        // 3. Create some attendance records
        AttendanceRecord::create([
            'user_id' => $user->id,
            'employee_code' => 'EMP001',
            'employee_name' => 'Alice Dev',
            'scan_date' => '2026-04-01',
            'scan_time' => '07:25:00',
        ]);
        AttendanceRecord::create([
            'user_id' => $user->id,
            'employee_code' => 'EMP001',
            'employee_name' => 'Alice Dev',
            'scan_date' => '2026-04-01',
            'scan_time' => '17:35:00',
        ]);

        // 4. Test download route
        Excel::fake();

        $response = $this->actingAs($user)
            ->getJson('/api/attendance/download?month=04&year=2026');

        $response->assertStatus(200);

        Excel::assertDownloaded("Attendance_Report_2026_04.xlsx", function (AttendanceExport $export) use ($user) {
            // Force the collection method to run to ensure no missing class/interface runtime exceptions
            $collection = $export->collection();
            $headings = $export->headings();
            
            // Check headers are correct
            $this->assertContains('Employee Name', $headings);
            $this->assertContains('Code', $headings);
            
            // Alice's data checks
            $aliceRow = $collection->firstWhere('name', 'Alice Dev');
            $this->assertNotNull($aliceRow);
            $this->assertEquals('EMP001', $aliceRow['code']);
            // Alice was Working on 2026-04-01 with IN 07:25 and OUT 17:35 (no late, LOP 0.00)
            $this->assertStringContainsString('Working', $aliceRow['2026-04-01']);
            $this->assertStringContainsString('07:25', $aliceRow['2026-04-01']);

            return true;
        });
    }

    public function test_company_attendance_pdf_can_be_generated()
    {
        $user = User::factory()->create([
            'month_start_date' => 1,
        ]);

        Employee::create([
            'user_id' => $user->id,
            'name' => 'Alice Dev',
            'code' => 'EMP001',
        ]);

        AttendanceRecord::create([
            'user_id' => $user->id,
            'employee_code' => 'EMP001',
            'employee_name' => 'Alice Dev',
            'scan_date' => '2026-04-01',
            'scan_time' => '07:25:00',
        ]);

        $response = $this->actingAs($user)
            ->get('/api/attendance/download-pdf?month=04&year=2026');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/pdf');
    }

    public function test_employee_pdf_can_be_generated()
    {
        $user = User::factory()->create([
            'month_start_date' => 1,
        ]);

        Employee::create([
            'user_id' => $user->id,
            'name' => 'Alice Dev',
            'code' => 'EMP001',
        ]);

        AttendanceRecord::create([
            'user_id' => $user->id,
            'employee_code' => 'EMP001',
            'employee_name' => 'Alice Dev',
            'scan_date' => '2026-04-01',
            'scan_time' => '07:25:00',
        ]);

        $response = $this->actingAs($user)
            ->get('/api/attendance/employee/EMP001/download-pdf?month=04&year=2026');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/pdf');
    }
}
