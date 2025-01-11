<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class SalaryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_visit_salaries_page(): void
    {
        $user = User::first();
        $response = $this->actingAs($user)->get('/salaries');

        $response->assertSee('Salaries');
        $response->assertStatus(200);
    }
}
