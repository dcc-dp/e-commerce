<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoris = [
            [
                'nama' => 'Elektronik',
                'deskripsi' => 'Berbagai macam alat elektronik seperti HP, Laptop, dan Aksesoris',
            ],
            [
                'nama' => 'Pakaian Pria',
                'deskripsi' => 'Koleksi pakaian pria mulai dari kemeja, kaos, hingga celana',
            ],
            [
                'nama' => 'Pakaian Wanita',
                'deskripsi' => 'Koleksi pakaian wanita terbaru dan terpopuler',
            ],
            [
                'nama' => 'Makanan & Minuman',
                'deskripsi' => 'Produk makanan khas daerah, camilan, dan minuman',
            ],
            [
                'nama' => 'Kerajinan Tangan',
                'deskripsi' => 'Produk hasil kerajinan tangan lokal dan suvenir',
            ],
        ];

        foreach ($kategoris as $kategori) {
            Kategori::create($kategori);
        }
    }
}
