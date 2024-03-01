<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
               ['kategori_id'=> 101,'kategori_kode' => 101, 'kategori_nama' => 'Pakaian dan Aksesoris'],
               ['kategori_id'=> 102,'kategori_kode' => 102, 'kategori_nama' => 'Elektronik'],
               ['kategori_id'=> 103,'kategori_kode' => 103, 'kategori_nama' => 'Perabotan'],
               ['kategori_id'=> 104,'kategori_kode' => 104, 'kategori_nama' => 'Makanan'],
               ['kategori_id'=> 105,'kategori_kode' => 105, 'kategori_nama' => 'Kesehatan'],
        ];
        DB::table('m_kategoris')->insert($data);
    }
}
