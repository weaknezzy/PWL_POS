<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'stok_id' => 10,
                'barang_id' => 1,
                'user_id'=> 3,
                'stok_tanggal' => '2022-01-03',
                'stok_jumlah' => 100,
            ],
            [
                'stok_id' => 9,
                'barang_id' => 2,
                'user_id' => 3,
                'stok_tanggal' => '2022-01-05',
                'stok_jumlah' => 24,
            ],
            [
                'stok_id' => 8,
                'barang_id' => 3,
                'user_id' => 3,
                'stok_tanggal' => '2022-01-12',
                'stok_jumlah' => 20,
            ],
            [
                'stok_id' => 7,
                'barang_id' => 4,
                'user_id' => 3,
                'stok_tanggal' => '2022/12/25',
                'stok_jumlah' => 150,
            ],
            [
                'stok_id' => 6,
                'barang_id' => 5,
                'user_id' => 3,
                'stok_tanggal' => '2022-05-06',
                'stok_jumlah' => 200,
            ],
            [
                'stok_id' => 5,
                'barang_id' => 6,
                'user_id' => 3,
                'stok_tanggal' => '2022-07-28',
                'stok_jumlah' => 255,
            ],
            [
                'stok_id' => 4,
                'barang_id' => 7,
                'user_id' => 3,
                'stok_tanggal' => '2022-08-11',
                'stok_jumlah' => 175,
            ],
            [
                'stok_id' => 3,
                'barang_id' => 8,
                'user_id' => 3,
                'stok_tanggal' => '2022-09-17',
                'stok_jumlah' => 188,
            ],
            [
                'stok_id' => 2,
                'barang_id' => 9,
                'user_id' => 3,
                'stok_tanggal' => '2022/10/19',
                'stok_jumlah' => 210,
            ],
            [
                'stok_id' => 1,
                'barang_id' => 10,
                'user_id' => 3,
                'stok_tanggal' => '2022/11/15',
                'stok_jumlah' =>199,
            ]
            ];
            DB::table('t_stoks') ->insert($data);
    }
}
