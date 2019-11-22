<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Cbn;

class GudangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Tbl_warehouses')->insert([
            'name' => '-',
            'lokasi' => '-',
            'user_id' =>  1,
            'created_at' => Cbn::now()->format('Y-m-d H:i:s'),
            'updated_at' => Cbn::now()->format('Y-m-d H:i:s')
        ]);
    }
}
