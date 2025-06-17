<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            'name' => 'Fahim',
            'email' => 'fahimlxp@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 'admin',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1,

        ]);

        DB::table('users')->insert([

            'name' => 'fahim',
            'email' => 'fahimmahmud264@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 'admin',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1,

        ]);

        DB::table('users')->insert([

            'name' => 'Attorny',
            'email' => 'attorny@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 'attorny',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1,

        ]);

        DB::table('users')->insert([

            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 'user',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1,

        ]);

       
    }
}
