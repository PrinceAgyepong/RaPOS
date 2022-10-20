<?php

namespace Database\Seeders;

use App\Models\UserType;
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
        $this->call(UserTypeSeeder::class);

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'), // password
            'remember_token' => Str::random(10),
            'user_type_id' => 1,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Staff',
            'email' => 'staff@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'), // password
            'remember_token' => Str::random(10),
            'user_type_id' => 2,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'), // password
            'remember_token' => Str::random(10),
            'user_type_id' => 3,
        ]);

        \App\Models\PaymentMethod::factory()->create([
            'name' => 'cash'
        ]);

        $this->call(MenSeeder::class);

    }
}
