<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class JobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_jobs')->insert([
            'code'          => 'ADM',
            'name'          => 'admin',
            'desc'          => 'Administator',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('tbl_jobs')->insert([
            'code'          => 'GDG',
            'name'          => 'Gudang',
            'desc'          => 'Input Bahan Baku',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('tbl_jobs')->insert([
            'code'          => 'CKR',
            'name'          => 'Cooker',
            'desc'          => 'Pemanggang kue',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
