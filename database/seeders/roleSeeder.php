<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'permissions' => json_encode([
                    'user' => true,
                    'user-add' => true,
                    'user-edit' => true,
                    'user-delete' => true,

                    'role' => true,
                    'role-add' => true,
                    'role-edit' => true,
                    'role-delete' => true,
                    'role-permissions' => true,

                    'medium' => true,
                    'medium-add' => true,
                    'medium-edit' => true,
                    'medium-delete' => true,

                    'store'=>true,
                    'store-add'=>true,
                    'store-edit'=>true,
                    'store-delete'=>true,

                    'category'=>true,
                    'category-add'=>true,
                    'category-edit'=>true,
                    'category-delete'=>true,

                    'table'=>true,
                    'table-add'=>true,
                    'table-edit'=>true,
                    'table-delete'=>true,

                    'menu'=>true,
                    'menu-add'=>true,
                    'menu-edit'=>true,
                    'menu-delete'=>true,

                ]),
            ],
            [
                'name' => 'Manager',
                'slug' => 'Manager',
                'permissions' => json_encode([

                ]),
            ],
            [
                'name' => 'Cashiar',
                'slug' => 'Cashiar',
                'permissions' => json_encode([

                ]),
            ],
            [
                'name' => 'Accountant',
                'slug' => 'accountant',
                'permissions' => json_encode([

                ]),
            ],
            [
                'name' => 'Staff',
                'slug' => 'Staff',
                'permissions' => json_encode([

                ]),
            ]

        ]);
    }
}
