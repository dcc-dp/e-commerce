<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class adminSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Test User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'alamat' => 'Jl. Contoh Alamat No. 123',
            'tmp_lahir' => 'Contoh Kota',
            'tgl_lahir' => '1990-01-01',
            'role' => 'admin',
            
        ]);
    }
}
