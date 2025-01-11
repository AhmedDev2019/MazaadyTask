<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class EmployeesTest extends TestCase
{
    public function test_visit_employees_page(): void
    {
        // $response = $this->get('/employees');
        
        $user = User::first();
        $response = $this->actingAs($user)->get('/employees');

        $response->assertSee('Employees');
        $response->assertStatus(200);
    }
}
