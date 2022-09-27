<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'), // password
            'remember_token' => Str::random(10),
            'isAdmin' => true,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'), // password
            'remember_token' => Str::random(10),
            'isAdmin' => false,
        ]);

        \App\Models\PaymentMethod::factory()->create([
            'name' => 'cash'
        ]);


        $this->call(MenSeeder::class);

    }
}
