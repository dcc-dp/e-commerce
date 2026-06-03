<?php

namespace Database\Seeders;

use App\Models\Produk;
use App\Models\Batch_foto;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat batch foto dummy
        $batch = Batch_foto::create(['nama' => 'Batch Foto 1']);
        
        // Asumsi Umkm dengan id 2 adalah 'Toko Laris Manis' dari UserSeeder
        // Asumsi Kategori id 1 ada dari KategoriSeeder
        Produk::create([
            'umkm_id' => 2,
            'nama' => 'Sepatu Kets Pria',
            'deskripsi' => 'Sepatu olahraga nyaman untuk digunakan harian.',
            'harga' => 150000,
            'stok' => 50,
            'berat' => 800,
            'satuan' => 1,
            'kategori_id' => 1,
            'batch_foto_id' => $batch->id,
            'status' => 'approved'
        ]);

        $batch2 = Batch_foto::create(['nama' => 'Batch Foto 2']);
        Produk::create([
            'umkm_id' => 2,
            'nama' => 'Tas Ransel Anti Air',
            'deskripsi' => 'Tas backpack multifungsi cocok untuk bekerja maupun sekolah.',
            'harga' => 250000,
            'stok' => 30,
            'berat' => 1200,
            'satuan' => 1,
            'kategori_id' => 1,
            'batch_foto_id' => $batch2->id,
            'status' => 'approved'
        ]);
        
        $batch3 = Batch_foto::create(['nama' => 'Batch Foto 3']);
        Produk::create([
            'umkm_id' => 2,
            'nama' => 'Topi Baseball',
            'deskripsi' => 'Topi baseball kasual dengan desain menarik.',
            'harga' => 45000,
            'stok' => 100,
            'berat' => 200,
            'satuan' => 1,
            'kategori_id' => 1,
            'batch_foto_id' => $batch3->id,
            'status' => 'approved'
        ]);
    }
}
