<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Department;
use App\Models\Salary;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        // delete all departments .
        DB::table('departments')->delete();

        $first_salary_id = Salary::first()->id;
        $last_salary_id = Salary::orderBy('id','DESC')->first()->id;

        // create departments again .
        Department::create([
            'name' => 'Web Development',
            'salary_id' => rand($first_salary_id,$last_salary_id)
        ]);

        Department::create([
            'name' => 'Mobile Development',
            'salary_id' => rand($first_salary_id,$last_salary_id)
        ]);

        Department::create([
            'name' => 'Desktop Development',
            'salary_id' => rand($first_salary_id,$last_salary_id)
        ]);

        Department::create([
            'name' => 'Networking',
            'salary_id' => rand($first_salary_id,$last_salary_id)
        ]);

        Department::create([
            'name' => 'AI Development',
            'salary_id' => rand($first_salary_id,$last_salary_id)
        ]);

        Department::create([
            'name' => 'Cyber Security',
            'salary_id' => rand($first_salary_id,$last_salary_id)
        ]);
    }
}
