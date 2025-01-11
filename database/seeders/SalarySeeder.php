<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Salary;

class SalarySeeder extends Seeder
{
    public function run(): void
    {
        // delete all departments .
        DB::table('salaries')->delete();

        Salary::create([
            'name' => 'First Salary',
            'amount' => '1000'
        ]);

        Salary::create([
            'name' => 'Second Salary',
            'amount' => '1200'
        ]);

        Salary::create([
            'name' => 'Third Salary',
            'amount' => '500'
        ]);

        Salary::create([
            'name' => 'Fourth Salary',
            'amount' => '1500'
        ]);

        Salary::create([
            'name' => 'Fifth Salary',
            'amount' => '850'
        ]);
    }
}
