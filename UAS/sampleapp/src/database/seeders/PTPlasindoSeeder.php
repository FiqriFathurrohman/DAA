<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PTPlasindoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pt_plasindos')->insert([
            [
                'name' => 'Admin PT Plasindo',
                'email' => 'admin@plasindo.com',
                'password' => Hash::make('password123'),
                'phone' => '08123456789',
                'address' => 'Jakarta, Indonesia',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User PT Plasindo',
                'email' => 'user@plasindo.com',
                'password' => Hash::make('password123'),
                'phone' => '08129876543',
                'address' => 'Bandung, Indonesia',
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Manager PT Plasindo',
                'email' => 'manager@plasindo.com',
                'password' => Hash::make('password123'),
                'phone' => '08121234567',
                'address' => 'Surabaya, Indonesia',
                'role' => 'manager',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
