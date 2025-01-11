<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;

class CalcTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_calculate_a_number(): void
    {
        // $user = User::first();

        $calc = calc(10,10);
        $this->assertEquals(20,$calc);

        // $this->assertTrue(true);
    }
}
