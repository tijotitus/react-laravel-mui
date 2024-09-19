<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Insert a single user
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => Hash::make('password123'), // Use a hashed password
            'remember_token' => Str::random(10),
        ]);

        // Insert multiple users
        DB::table('users')->insert([
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'alice.johnson@example.com',
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Bob Brown',
                'email' => 'bob.brown@example.com',
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
            ],
        ]);
    }
}
