<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_units')->insert([
            'name' => 'Rak',
            'desc' => '1 Rak isi 30 Biji',
            'user_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_units')->insert([
            'name' => 'Kotak',
            'desc' => '1 Kotak isi 10 Biji',
            'user_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
