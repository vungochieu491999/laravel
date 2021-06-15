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
            'slug' => "php",
        ];

        $seeds[] = [
            'name' => "Programming",
            'slug' => "programming",
        ];

        $seeds[] = [
            'name' => "Laravel",
            'slug' => "laravel",
        ];

        DB::table('tags')->insert($seeds);
    }
}
