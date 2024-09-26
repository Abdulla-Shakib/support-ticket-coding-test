<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // admin
        User::factory()->create([
            'type' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin@gmail.com'),
            'phoneNumber' => '01777777777',
        ]);

        // customer
        User::factory()->create([
            'type' => 'customer',
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'password' => bcrypt('customer@gmail.com'),
            'phoneNumber' => '01111111111',

        ]);
    }
}
