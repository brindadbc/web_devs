<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    // /**
    //  * Run the database seeds.
    //  */
    // public function run(): void
    // {
    //     //
    // }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@elearning.com'], // Check if admin already exists
            [
                'name' => 'Admin',
                'email' => 'admin@elearning.com',
                'password' => Hash::make('password'), // Change 'password' to a secure one
                'role' => 'admin',
            ]
        );
    }

}
