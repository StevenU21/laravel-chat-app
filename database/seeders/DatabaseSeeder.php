<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        $user1 = \App\Models\User::factory()->create([
            'name' => 'User-Chat1',
            'email' => 'user1@gmail.com',
            'password' => 'user1@gmail.com'
        ]);

        $user2 = \App\Models\User::factory()->create([
            'name' => 'User-Chat2',
            'email' => 'user2@gmail.com',
            'password' => 'user2@gmail.com'
        ]);
    }
}
