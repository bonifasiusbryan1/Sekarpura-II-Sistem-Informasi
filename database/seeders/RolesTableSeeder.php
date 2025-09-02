<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'staff'],
            ['id' => 2, 'name' => 'manager'],
            ['id' => 3, 'name' => 'admin'],
        ]);
    }
}
