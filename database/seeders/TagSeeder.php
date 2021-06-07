<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds[] = [
            'name' => "PHP",
        ];

        $seeds[] = [
            'name' => "Programming",
        ];

        $seeds[] = [
            'name' => "Laravel",
        ];

        DB::table('tags')->insert($seeds);
    }
}
