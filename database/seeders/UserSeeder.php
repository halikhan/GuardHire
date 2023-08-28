<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i > 1000; $i ++)
        {
        DB::table('users')->insert([
                    'name' => Str::random(10),
                    'email' => Str::random(10).'@gmail.com',
                    'password' => bcrypt('user'),
                    'is_admin' => 0,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);
        }


    }
}
