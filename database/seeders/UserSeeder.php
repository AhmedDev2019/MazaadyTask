<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // delete all users .
        DB::table('users')->delete();

        // Create Demo Account .
        User::create([
            'name' => 'Demo Account',
            'email' => 'demo@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
