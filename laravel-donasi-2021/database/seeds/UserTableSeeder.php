<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $relawanRole = Role::where('name', 'relawan')->first();

        $adminUser = User::create([
            'nama' => 'Administrator 1',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('admin1')
        ]);

        $relawan1User = User::create([
            'nama' => 'Relawan 1',
            'email' => 'relawan1@gmail.com',
            'password' => Hash::make('relawan1')
        ]);

        $relawan2User = User::create([
            'nama' => 'Relawan 2',
            'email' => 'relawan2@gmail.com',
            'password' => Hash::make('relawan2')
        ]);

        $adminUser->roles()->attach($adminRole);
        $relawan1User->roles()->attach($relawanRole);
        $relawan2User->roles()->attach($relawanRole);
    }
}
