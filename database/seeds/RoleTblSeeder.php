<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RoleTblSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_roles')->insert([
            'role'       => 'ADMIN',
            'route'      => 'admin.dashboard',
            'user_id'    => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 
        DB::table('tbl_roles')->insert([
            'role'       => 'PRODUKSI',
            'route'      => 'production.dashboard',
            'user_id'    => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 
        DB::table('tbl_roles')->insert([
            'role'       => 'GUDANG',
            'route'      => 'gudang.dashboard',
            'user_id'    => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
