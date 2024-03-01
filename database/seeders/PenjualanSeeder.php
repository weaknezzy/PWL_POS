<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_id' => 1,
                'user_id' => 3,
                'pembeli' => 'Azis',
                'penjualan_kode' => 1,
                'penjualan_tanggal' => '2022-02-11',
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 3,
                'pembeli' => 'Junaidi',
                'penjualan_kode' => 2,
                'penjualan_tanggal' => '2022-02-12',
            ],
            [
                'penjualan_id' => 3,
                'user_id' => 3,
                'pembeli' => 'Layla',
                'penjualan_kode' => 3,
                'penjualan_tanggal' => '2022-02-13',
            ],
            [
                'penjualan_id' => 4,
                'user_id' => 3,
                'pembeli' => 'Nolan',
                'penjualan_kode' => 4,
                'penjualan_tanggal' => '2022-02-14',
            ],
            [
                'penjualan_id' => 5,
                'user_id' => 3,
                'pembeli' => 'Zay',
                'penjualan_kode' => 5,
                'penjualan_tanggal' => '2022-02-15',
            ],
            [
                'penjualan_id' => 6,
                'user_id' => 3,
                'pembeli' => 'Zidan',
                'penjualan_kode' => 6,
                'penjualan_tanggal' => '2022-02-16',
            ],
            [
                'penjualan_id' => 7,
                'user_id' => 3,
                'pembeli' => 'Matondang',
                'penjualan_kode' => 7,
                'penjualan_tanggal' => '2022-02-17',
            ],
            [
                'penjualan_id' => 8,
                'user_id' => 3,
                'pembeli' => 'Alika',
                'penjualan_kode' => 8,
                'penjualan_tanggal' => '2022-02-18',
            ],
            [
                'penjualan_id' => 9,
                'user_id' => 3,
                'pembeli' => 'Alaysa',
                'penjualan_kode' => 9,
                'penjualan_tanggal' => '2022-02-19',
            ],
            [
                'penjualan_id' => 10,
                'user_id' => 3,
                'pembeli' => 'Sasa',
                'penjualan_kode' => 10,
                'penjualan_tanggal' => '2022-02-20',
            ],
            ];
         DB::table('t_penjualans')->insert($data);
    }
}
