<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_user_cannot_access_users_index(): void
    {
        $response = $this->get(route('users.index'));
        $response->assertRedirect(route('login'));
    }

    public function test_non_admin_user_cannot_access_users_index(): void
    {
        $user = User::factory()->create(['role' => 'admin']); // admin is not super_admin

        $response = $this
            ->actingAs($user)
            ->get(route('users.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_admin_user_can_access_users_index_with_employee_counts(): void
    {
        $superAdmin = User::factory()->create(['role' => 'super_admin']);
        $user = User::factory()->create(['role' => 'user']);
        
        // Add some employees for the user
        Employee::create([
            'user_id' => $user->id,
            'name' => 'John Employee',
            'code' => 'EMP111',
            'face_signature' => ['straight' => array_fill(0, 512, 0.1)]
        ]);

        $response = $this
            ->actingAs($superAdmin)
            ->get(route('users.index'));

        $response->assertOk();
        $response->assertViewHas('users');
        
        // Check that user has employees_count attribute loaded
        $users = $response->viewData('users');
        $retrievedUser = $users->firstWhere('id', $user->id);
        $this->assertNotNull($retrievedUser);
        $this->assertEquals(1, $retrievedUser->employees_count);
    }

    public function test_admin_user_can_view_specific_user_and_their_employees(): void
    {
        $superAdmin = User::factory()->create(['role' => 'super_admin']);
        $user = User::factory()->create(['role' => 'user']);
        
        // Add an employee
        $employee = Employee::create([
            'user_id' => $user->id,
            'name' => 'Alice Worker',
            'code' => 'EMP222',
            'face_signature' => ['straight' => array_fill(0, 512, 0.1)]
        ]);

        $response = $this
            ->actingAs($superAdmin)
            ->get(route('users.show', $user));

        $response->assertOk();
        $response->assertViewHas('user');
        $response->assertViewHas('employees');
        
        $employees = $response->viewData('employees');
        $this->assertCount(1, $employees);
        $this->assertEquals($employee->id, $employees->first()->id);
    }
}
