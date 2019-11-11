<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Cbn;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_items')->insert([
            'item_code' => '00001',
            'item_name' => 'Kerupuk',
            'item_unit' => 'Pcs',
            'item_price' =>  '2000',
            'user_id' => '1',
            'created_at' => Cbn::now()->format('Y-m-d H:i:s'),
            'updated_at' => Cbn::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_items')->insert([
            'item_code' => '00002',
            'item_name' => 'Jus Kotak',
            'item_unit' => 'Pcs',
            'item_price' =>  '7000',
            'user_id' => '1',
            'created_at' => Cbn::now()->format('Y-m-d H:i:s'),
            'updated_at' => Cbn::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_items')->insert([
            'item_code' => '00003',
            'item_name' => 'Pia Coklat',
            'item_unit' => 'Dos',
            'item_price' =>  '20000',
            'user_id' => '1',
            'created_at' => Cbn::now()->format('Y-m-d H:i:s'),
            'updated_at' => Cbn::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_items')->insert([
            'item_code' => '00004',
            'item_name' => 'Pia Keju',
            'item_unit' => 'Dos',
            'item_price' =>  '21000',
            'user_id' => '1',
            'created_at' => Cbn::now()->format('Y-m-d H:i:s'),
            'updated_at' => Cbn::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_items')->insert([
            'item_code' => '00005',
            'item_name' => 'Susu Pia',
            'item_unit' => 'Sachet',
            'item_price' =>  '4000',
            'user_id' => '1',
            'created_at' => Cbn::now()->format('Y-m-d H:i:s'),
            'updated_at' => Cbn::now()->format('Y-m-d H:i:s')
        ]);
    }
}
