<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Pastikan Anda mengimpor DB

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Daftar nama pengguna yang unik
        $names = [
            'Alice',
            'Bob',
            'Charlie',
            'David',
            'Eva',
            'Frank',
            'Grace',
            'Hannah',
            'Ian',
            'Julia',
        ];

        // Menambahkan data dummy untuk tabel users
        foreach ($names as $index => $name) {
            DB::table('users')->insert([
                'name' => $name,
                'email' => strtolower($name) . '@example.com', // Membuat email dengan nama kecil
                'password' => bcrypt('secret'), // Pastikan password di-hash
                'id_role' => rand(1, 2), // Menggunakan id_role antara 1 dan 2
            ]);
        }
    }
}
