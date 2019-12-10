<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_user_type')->insert([
            'type'      => 'sys_admin',
            'name'      => 'System Admin',
            'place'     => 'Admin Office',
            'desc'      => 'administrator sistem bertugas mengembangkan dan mengurusi keperluan dan kebutuhan sistem',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_user_type')->insert([
            'type'      => 'stocker',
            'name'      => 'Admin Bahan Baku',
            'place'     => 'Gudang Bahan Baku',
            'desc'      => 'administrator bahan baku bertugas meginput bahan baku yang keluar dan masuk',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_user_type')->insert([
            'type'      => 'cooker',
            'name'      => 'Staff Pemanggang',
            'place'     => 'Dapur',
            'desc'      => 'Menginput semua barang setengah jadi yang di panggang',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_user_type')->insert([
            'type'      => 'product_keeper',
            'name'      => 'Admin Gudang',
            'place'     => 'Gudang Jadi',
            'desc'      => 'Menginput semua barang yang yang telah jadi dan diproduksi',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
