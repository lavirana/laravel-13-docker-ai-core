<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Rahul',
            'email' => 'rahul@gmail.com',
            'password' => bcrypt('password123'),
        ]);
        User::create([
            'name' => 'Raj',
            'email' => 'raj@gmail.com',
            'password' => bcrypt('password123'),
        ]);
    }
}
