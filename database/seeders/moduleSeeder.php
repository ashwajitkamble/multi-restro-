<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class moduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([
            [
                'name' => 'System setting',
                'parent' => 0,
            ],
            [
                'name' => 'User',
                'parent' => 1,
            ],
            [
                'name' => 'Role',
                'parent' => 1,
            ],
            [
                'name' => 'Stores',
                'parent' => 0,
            ],
            [
                'name' => 'Restaurants',
                'parent' => 4,
            ],
            [
                'name' => 'Tables',
                'parent' => 0,
            ],
            [
                'name' => 'Manages Tables',
                'parent' => 6,
            ],
            [
                'name' => 'Category',
                'parent' => 0,
            ],
            [
                'name' => 'Manages Categories',
                'parent' => 8,
            ],
            [
                'name' => 'Products',
                'parent' => 0,
            ],
            [
                'name' => 'Manages Products',
                'parent' => 10,
            ],
        ]);
    }
}
