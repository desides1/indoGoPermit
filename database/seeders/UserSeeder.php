<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'Diana',
                'email' => 'diana@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('diana1234'), // Default password
                'remember_token' => Str::random(10),
            ],
            [
                'username' => 'Rose',
                'email' => 'rose@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('rose1234'), // Default password
                'remember_token' => Str::random(10),
            ],
            [
                'username' => 'Lily',
                'email' => 'lily@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('lily1234'), // Default password
                'remember_token' => Str::random(10),
            ],
        ];

        foreach ($users as $user) {
            User::factory()->create($user);
        }
    }
}
