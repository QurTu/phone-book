<?php

namespace Database\Seeders;

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
            DB::table('users')->insert([
                'name' => 'admin',
                'email' => 'martis55@inbox.lt',
                'password' => Hash::make('12345678') ,
                'role_id' => '1'
            ]);
            DB::table('users')->insert([
                'name' => 'bot2',
                'email' => 'martis5@inbox.lt',
                'password' => Hash::make('12345678') ,
                'role_id' => '2'
            ]);
        }

}
