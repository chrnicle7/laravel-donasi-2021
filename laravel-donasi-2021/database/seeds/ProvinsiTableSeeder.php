<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Provinsi;

class ProvinsiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provinsi::truncate();

        $provinsis = [
            [1, 'Aceh', 1, '2021-05-09 23:01:06', 1],
            [2, 'Sumatera Utara', 1, '2021-05-09 23:01:06', 1],
            [3, 'Sumatera Barat', 1, '2021-05-09 23:01:06', 1],
            [4, 'Riau', 1, '2021-05-09 23:01:06', 1],
            [5, 'Jambi', 1, '2021-05-09 23:01:06', 1],
            [6, 'Sumatera Selatan', 1, '2021-05-09 23:01:06', 1],
            [7, 'Bengkulu', 1, '2021-05-09 23:01:06', 1],
            [8, 'Lampung', 1, '2021-05-09 23:01:06', 1],
            [9, 'Kepulauan Bangka Belitung', 1, '2021-05-09 23:01:06', 1],
            [10, 'Kepulauan Riau', 1, '2021-05-09 23:01:06', 1],
            [11, 'Dki Jakarta', 1, '2021-05-09 23:01:06', 1],
            [12, 'Jawa Barat', 1, '2021-05-09 23:01:06', 1],
            [13, 'Jawa Tengah', 1, '2021-05-09 23:01:06', 1],
            [14, 'Daerah Istimewa Yogyakarta', 1, '2021-05-09 23:01:06', 1],
            [15, 'Jawa Timur', 1, '2021-05-09 23:01:06', 1],
            [16, 'Banten', 1, '2021-05-09 23:01:06', 1],
            [17, 'Bali', 1, '2021-05-09 23:01:06', 1],
            [18, 'Nusa Tenggara Barat', 1, '2021-05-09 23:01:06', 1],
            [19, 'Nusa Tenggara Timur', 1, '2021-05-09 23:01:06', 1],
            [20, 'Kalimantan Barat', 1, '2021-05-09 23:01:06', 1],
            [21, 'Kalimantan Tengah', 1, '2021-05-09 23:01:06', 1],
            [22, 'Kalimantan Selatan', 1, '2021-05-09 23:01:06', 1],
            [23, 'Kalimantan Timur', 1, '2021-05-09 23:01:06', 1],
            [24, 'Kalimantan Utara', 1, '2021-05-09 23:01:06', 1],
            [25, 'Sulawesi Utara', 1, '2021-05-09 23:01:06', 1],
            [26, 'Sulawesi Tengah', 1, '2021-05-09 23:01:06', 1],
            [27, 'Sulawesi Selatan', 1, '2021-05-09 23:01:06', 1],
            [28, 'Sulawesi Tenggara', 1, '2021-05-09 23:01:06', 1],
            [29, 'Gorontalo', 1, '2021-05-09 23:01:06', 1],
            [30, 'Sulawesi Barat', 1, '2021-05-09 23:01:06', 1],
            [31, 'Maluku', 1, '2021-05-09 23:01:06', 1],
            [32, 'Maluku Utara', 1, '2021-05-09 23:01:06', 1],
            [33, 'P A P U A', 1, '2021-05-09 23:01:06', 1],
            [34, 'Papua Barat', 1, '2021-05-09 23:01:06', 1]
        ];

        foreach($provinsis as $provinsi){
            $data['nama'] = $provinsi[1];
            $data['is_verified'] = $provinsi[2];
            $data['inserted_at'] = $provinsi[3];
            $data['inserted_by'] = $provinsi[4];

            DB::table('provinsi')->insert($data);
        }
    }
}
