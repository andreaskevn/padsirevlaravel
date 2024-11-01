<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BahanBakuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Daftar bahan baku
        $bahanBakus = [
            [
                'nama_bahan_baku' => 'Beras',
                'harga_bahan_baku' => 10000,
                'gambar_bahan_baku' => 'images/user-36-05.jpg',
                'jumlah_bahan_baku' => 50,
            ],
            [
                'nama_bahan_baku' => 'Gula',
                'harga_bahan_baku' => 12000,
                'gambar_bahan_baku' => 'images/user-36-05.jpg',
                'jumlah_bahan_baku' => 30,
            ],
            [
                'nama_bahan_baku' => 'Minyak Goreng',
                'harga_bahan_baku' => 15000,
                'gambar_bahan_baku' => 'images/user-36-05.jpg',
                'jumlah_bahan_baku' => 20,
            ],
            [
                'nama_bahan_baku' => 'Tepung Terigu',
                'harga_bahan_baku' => 8000,
                'gambar_bahan_baku' => 'images/user-36-05.jpg',
                'jumlah_bahan_baku' => 40,
            ],
            [
                'nama_bahan_baku' => 'Kecap',
                'harga_bahan_baku' => 5000,
                'gambar_bahan_baku' => 'images/user-36-05.jpg',
                'jumlah_bahan_baku' => 25,
            ],
        ];

        // Menambahkan data dummy ke tabel bahanbakus
        foreach ($bahanBakus as $bahanBaku) {
            DB::table('bahanbakus')->insert($bahanBaku);
        }
    }
}
