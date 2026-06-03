<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Keranjang;
use App\Models\Umkm;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin Utama',
            'alamat' => 'Kantor Pusat',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'jkl' => 'L',
            'tmp_lahir' => 'Jakarta',
            'tgl_lahir' => '1990-01-01',
            'role' => 'admin'
        ]);
        Keranjang::create(['user_id' => $admin->id]);
        Umkm::create([
            'user_id' => $admin->id,
            'nama' => 'Toko Admin',
            'deskripsi' => 'Toko utama sistem',
            'alamat' => 'Kantor Pusat',
            'nomorhp' => '081234567890'
        ]);

        $penjual = User::create([
            'name' => 'Toko Laris',
            'alamat' => 'Pasar Baru',
            'email' => 'penjual@gmail.com',
            'password' => Hash::make('password'),
            'jkl' => 'P',
            'tmp_lahir' => 'Bandung',
            'tgl_lahir' => '1995-05-05',
            'role' => 'penjual'
        ]);
        Keranjang::create(['user_id' => $penjual->id]);
        Umkm::create([
            'user_id' => $penjual->id,
            'nama' => 'Toko Laris Manis',
            'deskripsi' => 'Menjual segala kebutuhan',
            'alamat' => 'Pasar Baru',
            'nomorhp' => '081987654321'
        ]);

        $user = User::create([
            'name' => 'Pembeli Setia',
            'alamat' => 'Perumahan Indah',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'jkl' => 'L',
            'tmp_lahir' => 'Surabaya',
            'tgl_lahir' => '2000-10-10',
            'role' => 'user'
        ]);
        Keranjang::create(['user_id' => $user->id]);
    }
}
