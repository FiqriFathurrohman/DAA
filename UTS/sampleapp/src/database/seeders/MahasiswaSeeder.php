<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;


class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        Mahasiswa::create([
            'nim' => '20230801209',
            'name' => 'Fiqri Fathurrohman',
            'ips' => 3.75,
            'password' => 'password123',
        ]);
    }
}
