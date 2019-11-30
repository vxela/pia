<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon as Carbon;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i=0; $i<5; $i++) {
            DB::table('tbl_employees')->insert([
                'name'          =>  $faker->name(),
                'code'          =>  '-',
                'nik'           =>  $faker->nik(),
                'address'       =>  $faker->address(),
                'phone'         =>  '082344566733',
                'date_in'       =>  '2019-10-12',
                'created_at'    =>  Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>  Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
