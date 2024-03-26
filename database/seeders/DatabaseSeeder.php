<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'username' => 'Admin',
            'role' => 'admin',
            'password' => Hash::make("password"),
        ]);

        \App\Models\User::factory()->create([
            'username' => 'Res1',
            'role' => 'user',
            'password' => Hash::make("password"),
        ]);

        \App\Models\User::factory()->create([
            'username' => 'Res2',
            'role' => 'user',
            'password' => Hash::make("password"),
        ]);
        \App\Models\User::factory()->create([
            'username' => 'Res3',
            'role' => 'user',
            'password' => Hash::make("password"),
        ]);
        \App\Models\User::factory()->create([
            'username' => 'Res4',
            'role' => 'user',
            'password' => Hash::make("password"),
        ]);
        \App\Models\User::factory()->create([
            'username' => 'Res5',
            'role' => 'user',
            'password' => Hash::make("password"),
        ]);
        \App\Models\User::factory()->create([
            'username' => 'Res6',
            'role' => 'user',
            'password' => Hash::make("password"),
        ]);
        \App\Models\User::factory()->create([
            'username' => 'Res7',
            'role' => 'user',
            'password' => Hash::make("password"),
        ]);
    }
}
