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

            'name_english' => 'Faisal rabbani',
            'employee_id' => 1000000000001,
            'email' => 'farzad.edsoft@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 'system',
            'belongs_to' => 0,
            'role_id' => 1,
            'permissions' => 'create, read, update, delete',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1,

        ]);

        DB::table('users')->insert([

            'name_english' => 'HR Admin',
            'employee_id' => 1000000000002,
            'email' => 'hr.admin@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 'hr',
            'belongs_to' => 0,
            'role_id' => 2,
            'permissions' => 'create, read, update, delete',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1,

        ]);

        DB::table('users')->insert([

            'name_english' => 'EMPLOYEE',
            'employee_id' => 1000000000003,
            'email' => 'employee@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 'employee',
            'belongs_to' => 0,
            'role_id' => 3,
            'permissions' => 'create, read, update',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1,

        ]);

        DB::table('users')->insert([

            'name_english' => 'CHAIRMAN',
            'employee_id' => 1000000000004,
            'email' => 'chairman@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 'chairman',
            'belongs_to' => 0,
            'role_id' => 3,
            'permissions' => 'create, read, update',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1,

        ]);

        DB::table('users')->insert([

            'name_english' => 'DIRECTOR_GENERAL',
            'employee_id' => 1000000000005,
            'email' => 'director_general@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 'director_general',
            'belongs_to' => 0,
            'role_id' => 3,
            'permissions' => 'create, read, update',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1,

        ]);
        DB::table('users')->insert([

            'name_english' => 'DIRECTOR_ADMIN',
            'employee_id' => 1000000000006,
            'email' => 'director_admin@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 'director_admin',
            'belongs_to' => 0,
            'role_id' => 3,
            'permissions' => 'create, read, update',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1,

        ]);

    }
}
