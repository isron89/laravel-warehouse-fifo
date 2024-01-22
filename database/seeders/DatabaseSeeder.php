<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@nusantara-warehouse.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin'
        ]);

        \App\Models\Barang::factory()->create([
            'kode_barang' => '20230801',
            'nama_barang' => 'Keramik 1',
            'merk' => 'Keramik',
            'tipe' => 'Keramik 1 Tipe 1',
            'supplier' => 'Supplier 1',
            'harga_jual' => 10000
        ]);
    }
}
