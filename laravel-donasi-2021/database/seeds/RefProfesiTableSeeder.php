<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RefProfesiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time_now = Carbon::now();

        $profesis = [
            ['Guru/Dosen Negeri', 1, $time_now, 1],
            ['Pegawai Negri bukan Guru/Dosen', 1, $time_now, 1],
            ['ABRI/TNI', 1, $time_now, 1],
            ['Guru/Dosen Swasta', 1, $time_now, 1],
            ['Pegawai Swasta bukan Guru/Dosen', 1, $time_now, 1],
            ['Pedagang/Wiraswasta', 1, $time_now, 1],
            ['Ahli Profesional yang hanya bekerja secara perorangan', 1, $time_now, 1],
            ['Petani/Nelayan', 1, $time_now, 1],
            ['Buruh/Orang yang bekerja dengan tenaga fisik saja', 1, $time_now, 1],
            ['Pensiunan Pegawai Negeri/TNI', 1, $time_now, 1],
            ['Pensiunan Pegawai Swasta', 1, $time_now, 1],
            ['Lain-lain', 1, $time_now, 1],
        ];

        foreach($profesis as $profesi){
            $data['nama'] = $profesi[0];
            $data['is_active'] = $profesi[1];
            $data['inserted_at'] = $profesi[2];
            $data['inserted_by'] = $profesi[3];

            DB::table('ref_profesi')->insert($data);
        }
    }
}

