<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'Admin Universitas',
            'nim' => '1234567890', // Nilai nim
            'password' => Hash::make('admin123'), // Kata sandi untuk admin
        ]);
    }
}
