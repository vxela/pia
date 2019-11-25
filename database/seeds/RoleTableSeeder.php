<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_roles')->insert([
            'role'  => 'admin',
            'user_id'   => '1',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d')
        ]);
        DB::table('tbl_roles')->insert([
            'role'  => 'manajemen',
            'user_id'   => '1',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d')
        ]);
        DB::table('tbl_roles')->insert([
            'role'  => 'gudang',
            'user_id'   => '1',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d')
        ]);
        DB::table('tbl_roles')->insert([
            'role'  => 'dapur',
            'user_id'   => '1',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d')
        ]);
    }
}
