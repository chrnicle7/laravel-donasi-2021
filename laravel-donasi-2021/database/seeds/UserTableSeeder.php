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
        $fundraiserRole = Role::where('name', 'fundraiser')->first();

        $adminUser = User::create([
            'nama' => 'Administrator 1',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('admin1'),
            'is_verified' => 1,
        ]);

        $relawan1User = User::create([
            'nama' => 'Relawan 1',
            'email' => 'relawan1@gmail.com',
            'password' => Hash::make('relawan1'),
            'is_verified' => 1,
        ]);

        $relawan2User = User::create([
            'nama' => 'Relawan 2',
            'email' => 'relawan2@gmail.com',
            'password' => Hash::make('relawan2'),
            'is_verified' => 1,
        ]);

        $fundraiserUser1 = User::create([
            'nama' => 'Fundraiser 1',
            'email' => 'fundraiser1@gmail.com',
            'password' => Hash::make('fundraiser1'),
            'is_verified' => 1,
        ]);

        $adminUser->roles()->attach($adminRole);
        $relawan1User->roles()->attach($relawanRole);
        $relawan2User->roles()->attach($relawanRole);
        $fundraiserUser1->roles()->attach($fundraiserRole);
    }
}
