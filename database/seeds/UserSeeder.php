<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'emp_id' => '2', 
            'name' => 'user1', 
            'email' => 'user1@mail.com', 
            'password' => bcrypt('admin1234'), 
            'user_role' => '4'
        ]);
        DB::table('users')->insert([
            'emp_id' => '3', 
            'name' => 'user2', 
            'email' => 'user2@mail.com', 
            'password' => bcrypt('admin1234'), 
            'user_role' => '4'
        ]);
        DB::table('users')->insert([
            'emp_id' => '4', 
            'name' => 'user3', 
            'email' => 'user3@mail.com', 
            'password' => bcrypt('admin1234'), 
            'user_role' => '4'
        ]);
    }
}
