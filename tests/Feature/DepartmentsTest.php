<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class DepartmentsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_visit_departments_page(): void
    {
        // $response = $this->get('/departments');
        
        $user = User::first();
        $response = $this->actingAs($user)->get('/departments');
        $response->assertSee('Departments');
        $response->assertStatus(200);
    }
}
