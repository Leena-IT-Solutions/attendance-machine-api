<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Employee;
use App\Models\AttendanceRecord;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FaceRecognitionTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
    }

    public function test_employee_creation_extracts_embedding_from_photo()
    {
        // 1. Create a user
        $user = User::factory()->create();

        // 2. Mock the Python microservice /embeddings endpoint
        $fakeEmbedding = array_fill(0, 512, 0.1);
        Http::fake([
            '*/embeddings' => Http::response([
                'embedding' => $fakeEmbedding
            ], 200)
        ]);

        // 3. Post employee registration request with photo_base64
        $photoBase64 = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNk+M9QDwADhgGAWjR9awAAAABJRU5ErkJggg==';
        
        $response = $this->actingAs($user)
            ->postJson('/api/employees', [
                'name' => 'Charlie Smith',
                'code' => 'EMP100',
                'photo_base64' => $photoBase64
            ]);

        // 4. Assert response and database state
        $response->assertStatus(200);
        $response->assertJsonPath('employee.code', 'EMP100');

        // Verify the database record contains the signature
        $employee = Employee::where('code', 'EMP100')->first();
        $this->assertNotNull($employee);
        $this->assertNotNull($employee->face_signature);
        $this->assertEquals($fakeEmbedding, $employee->face_signature['straight']);
        
        // Assert the photo file was stored
        $this->assertNotNull($employee->photo);
        Storage::disk('public')->assertExists($employee->photo);

        // Verify HTTP call was made
        Http::assertSent(function ($request) {
            return str_contains($request->url(), '/embeddings');
        });
    }

    public function test_attendance_recognize_logs_attendance_on_successful_match()
    {
        // 1. Create operator and employee with pre-existing embedding
        $user = User::factory()->create();
        $fakeEmbedding = array_fill(0, 512, 0.2);
        
        $employee = Employee::create([
            'user_id' => $user->id,
            'name' => 'Dave Miller',
            'code' => 'EMP200',
            'face_signature' => ['straight' => $fakeEmbedding]
        ]);

        // 2. Mock the Python microservice /search endpoint to return a positive match
        Http::fake([
            '*/search' => Http::response([
                'best_match_code' => 'EMP200',
                'similarity' => 0.88,
                'recognized' => true
            ], 200)
        ]);

        // 3. Post face scan to recognize endpoint
        $photoBase64 = 'data:image/jpeg;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNk+M9QDwADhgGAWjR9awAAAABJRU5ErkJggg==';
        
        $response = $this->actingAs($user)
            ->postJson('/api/attendance/recognize', [
                'photo_base64' => $photoBase64,
                'scan_date' => '2026-06-04',
                'scan_time' => '09:00:00'
            ]);

        // 4. Assert response is successful
        $response->assertStatus(200);
        $response->assertJsonPath('status', 'success');
        $response->assertJsonPath('employee.code', 'EMP200');
        $response->assertJsonPath('employee.name', 'Dave Miller');
        $response->assertJsonPath('type', 'IN');

        // Verify attendance record was logged in DB
        $record = AttendanceRecord::where('employee_code', 'EMP200')
            ->where('scan_date', '2026-06-04')
            ->first();
        
        $this->assertNotNull($record);
        $this->assertEquals('09:00:00', $record->scan_time);

        // Verify HTTP call was made
        Http::assertSent(function ($request) {
            return str_contains($request->url(), '/search') &&
                   str_contains($request->body(), 'candidates_json');
        });
    }

    public function test_attendance_recognize_returns_mismatch_status_on_unrecognized()
    {
        // 1. Create operator and employee
        $user = User::factory()->create();
        
        Employee::create([
            'user_id' => $user->id,
            'name' => 'Dave Miller',
            'code' => 'EMP200',
            'face_signature' => ['straight' => array_fill(0, 512, 0.2)]
        ]);

        // 2. Mock search to return recognized=false
        Http::fake([
            '*/search' => Http::response([
                'best_match_code' => null,
                'similarity' => 0.15,
                'recognized' => false
            ], 200)
        ]);

        // 3. Post probe image
        $photoBase64 = 'data:image/jpeg;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNk+M9QDwADhgGAWjR9awAAAABJRU5ErkJggg==';
        
        $response = $this->actingAs($user)
            ->postJson('/api/attendance/recognize', [
                'photo_base64' => $photoBase64,
                'scan_date' => '2026-06-04',
                'scan_time' => '09:00:00'
            ]);

        // 4. Assert error status
        $response->assertStatus(422);
        $response->assertJsonPath('status', 'mismatch');
        
        // Assert no attendance record was logged
        $this->assertEquals(0, AttendanceRecord::count());
    }

    public function test_attendance_recognize_forwards_to_external_api_when_configured()
    {
        // 1. Create operator with external API configured and employee
        $user = User::factory()->create([
            'attendance_api_url' => 'https://external-api.test/attendance',
            'api_token' => 'secure-token-123'
        ]);
        $fakeEmbedding = array_fill(0, 512, 0.2);
        
        $employee = Employee::create([
            'user_id' => $user->id,
            'name' => 'Dave Miller',
            'code' => 'EMP200',
            'face_signature' => ['straight' => $fakeEmbedding]
        ]);

        // 2. Mock both the face service search AND the external API POST request
        Http::fake([
            '*/search' => Http::response([
                'best_match_code' => 'EMP200',
                'similarity' => 0.88,
                'recognized' => true
            ], 200),
            'https://external-api.test/attendance' => Http::response(['status' => 'ok'], 200)
        ]);

        // 3. Post face scan to recognize endpoint
        $photoBase64 = 'data:image/jpeg;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNk+M9QDwADhgGAWjR9awAAAABJRU5ErkJggg==';
        
        $response = $this->actingAs($user)
            ->postJson('/api/attendance/recognize', [
                'photo_base64' => $photoBase64,
                'scan_date' => '2026-06-04',
                'scan_time' => '09:00:00'
            ]);

        // 4. Assert response is successful
        $response->assertStatus(200);

        // Verify that the external API request was sent with the correct payload and header
        Http::assertSent(function ($request) {
            return $request->url() === 'https://external-api.test/attendance' &&
                   $request->hasHeader('Authorization', 'Bearer secure-token-123') &&
                   $request['employee_code'] === 'EMP200' &&
                   $request['p_date'] === '2026-06-04' &&
                   $request['p_time'] === '09:00:00';
        });
    }
}
