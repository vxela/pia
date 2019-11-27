<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'emp_id' => '0', 
            'name' => 'admin', 
            'email' => 'admin@mail.com', 
            'password' => bcrypt('admin1234'), 
            'user_role' => '1'
        ]);
        DB::table('users')->insert([
            'emp_id' => '1', 
            'name' => 'user', 
            'email' => 'user@mail.com', 
            'password' => bcrypt('user1234'), 
            'user_role' => '3'
        ]);        
    }
}
