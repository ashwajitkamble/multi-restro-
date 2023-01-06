<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class methodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('methods')->insert([
            [
                'module_id' => 2,
                'route_name' => 'user',
                'display_name' => 'List',
                'published' => true,
            ],
            [
                'module_id' => 2,
                'route_name' => 'user-add',
                'display_name' => 'Add',
                'published' => true,
            ],
            [
                'module_id' => 2,
                'route_name' => 'user-edit',
                'display_name' => 'Edit',
                'published' => true,
            ],
            [
                'module_id' => 2,
                'route_name' => 'user-delete',
                'display_name' => 'Delete',
                'published' => false,
            ],
            [
                'module_id' => 3,
                'route_name' => 'role',
                'display_name' => 'List',
                'published' => true,
            ],
            [
                'module_id' => 3,
                'route_name' => 'role-add',
                'display_name' => 'Add',
                'published' => true,
            ],
            [
                'module_id' => 3,
                'route_name' => 'role-edit',
                'display_name' => 'Edit',
                'published' => true,
            ],
            [
                'module_id' => 3,
                'route_name' => 'role-delete',
                'display_name' => 'Delete',
                'published' => false,
            ],
            [
                'module_id' => 3,
                'route_name' => 'store',
                'display_name' => 'List',
                'published' => true,
            ],
            [
                'module_id' => 3,
                'route_name' => 'store-add',
                'display_name' => 'Add',
                'published' => true,
            ],
            [
                'module_id' => 3,
                'route_name' => 'store-edit',
                'display_name' => 'Edit',
                'published' => true,
            ],
            [
                'module_id' => 3,
                'route_name' => 'store-delete',
                'display_name' => 'Delete',
                'published' => false,
            ],
            [
                'module_id' => 3,
                'route_name' => 'category',
                'display_name' => 'List',
                'published' => true,
            ],
            [
                'module_id' => 3,
                'route_name' => 'category-add',
                'display_name' => 'Add',
                'published' => true,
            ],
            [
                'module_id' => 3,
                'route_name' => 'category-edit',
                'display_name' => 'Edit',
                'published' => true,
            ],
            [
                'module_id' => 3,
                'route_name' => 'category-delete',
                'display_name' => 'Delete',
                'published' => false,
            ],
            [
                'module_id' => 3,
                'route_name' => 'table',
                'display_name' => 'List',
                'published' => true,
            ],
            [
                'module_id' => 3,
                'route_name' => 'table-add',
                'display_name' => 'Add',
                'published' => true,
            ],
            [
                'module_id' => 3,
                'route_name' => 'table-edit',
                'display_name' => 'Edit',
                'published' => true,
            ],
            [
                'module_id' => 3,
                'route_name' => 'table-delete',
                'display_name' => 'Delete',
                'published' => false,
            ],
            [
                'module_id' => 3,
                'route_name' => 'menu',
                'display_name' => 'List',
                'published' => true,
            ],
            [
                'module_id' => 3,
                'route_name' => 'menu-add',
                'display_name' => 'Add',
                'published' => true,
            ],
            [
                'module_id' => 3,
                'route_name' => 'menu-edit',
                'display_name' => 'Edit',
                'published' => true,
            ],
            [
                'module_id' => 3,
                'route_name' => 'menu-delete',
                'display_name' => 'Delete',
                'published' => false,
            ],
            
        ]);
    }
}
