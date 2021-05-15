<?php

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
        $this->call(RolesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ProvinsiTableSeeder::class);
        $this->call(KabupatenTableSeeder::class);
        $this->call(KecamatanTableSeeder::class);
        // $this->call(KelurahanTableSeeder::class);
        $this->call(RefProfesiTableSeeder::class);
        $this->call(RefAgamaTableSeeder::class);
        $this->call(RefVendorSavingTableSeeder::class);
    }
}
