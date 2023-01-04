<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Ashwajit',
            'last_name' => 'Kamble',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'mobile' => '9403904296',
            'store_id' => 0,
            'status' => 1,
        ]);
    }
}
