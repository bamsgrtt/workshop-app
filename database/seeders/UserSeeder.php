<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        foreach (range(1, 5) as $index) {
            User::create([
                'name' => "User Seeder $index",
                'email' => "seeder$index@example.com",
                'password' => Hash::make('password123'),
            ]);
        }   

    }
}
