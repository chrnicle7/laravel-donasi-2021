<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RefAgamaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time_now = Carbon::now();

        $agamas = [
            ['Islam', 1, $time_now, 1],
            ['Kristen', 1, $time_now, 1],
            ['Katolik', 1, $time_now, 1],
            ['Hindu', 1, $time_now, 1],
            ['Budha', 1, $time_now, 1],
            ['Konghucu', 1, $time_now, 1],
        ];

        foreach($agamas as $agama){
            $data['nama'] = $agama[0];
            $data['is_active'] = $agama[1];
            $data['inserted_at'] = $agama[2];
            $data['inserted_by'] = $agama[3];

            DB::table('ref_agama')->insert($data);
        }
    }
}
