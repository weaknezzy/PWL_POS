<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 101,
                'barang_kode' => 01,
                'barang_nama' => 'Kaos',
                'harga_beli' => 100.000,
                'harga_jual' => 120.000,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 102,
                'barang_kode' => 02,
                'barang_nama' => 'TWS R50i',
                'harga_beli' => 180.000,
                'harga_jual' => 195.000,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 103,
                'barang_kode' => 03,
                'barang_nama' => 'Sofa Luxury',
                'harga_beli' => 800.000,
                'harga_jual' => 1200000,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 104,
                'barang_kode' => 04,
                'barang_nama' => 'Burger Chicken Deluxe',
                'harga_beli' => 44.000,
                'harga_jual' => 52.000,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 105,
                'barang_kode' => 05,
                'barang_nama' => 'Sabun',
                'harga_beli' => 50.000,
                'harga_jual' => 70.000,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 101,
                'barang_kode' => 06,
                'barang_nama' => 'Jeans',
                'harga_beli' => 150.000,
                'harga_jual' => 270.000,
            ],
            [              
                'barang_id' => 7,
                'kategori_id' => 102,
                'barang_kode' => 07,
                'barang_nama' => 'Baseus Charger Type-C',
                'harga_beli' => 119.000,
                'harga_jual' => 162.000,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 103,
                'barang_kode' => 8,
                'barang_nama' => 'Kursi Pijat',
                'harga_beli' => 670.999,
                'harga_jual' => 995.000,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 104,
                'barang_kode' => 9,
                'barang_nama' => 'Gacoan lvl 10',
                'harga_beli' => 10.000,
                'harga_jual' => 12.000,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 105,
                'barang_kode' => 10,
                'barang_nama' => 'Skintific Sunscreen',
                'harga_beli' => 43.500,
                'harga_jual' => 50.000,
            ]
            ];
            DB::table('m_barangs') ->insert($data);
    }
}
