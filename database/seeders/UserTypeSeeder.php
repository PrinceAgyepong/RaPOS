<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserType::factory()->create([
            'id' => 1,
            'type' => 'admin'
        ]);
        
        UserType::factory()->create([
            'id' => 2,
            'type' => 'staff'
        ]);
        
        UserType::factory()->create([
            'id' => 3,
            'type' => 'customer'
        ]);

    }
}
