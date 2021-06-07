<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'first_name' => "Hiếu",
                'last_name' => "Vũ Ngọc",
                'username' => "hieuvn",
                'email' => "hieuvn@smartosc.com",
                'password' => bcrypt("qq36Qzy&"),
                'phone' => "0869034706",
                'permissions' => "{}",
                'super_user' => 1,
                'completed_profile' => 1,
            ]
        );
    }
}
