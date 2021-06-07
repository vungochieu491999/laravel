<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds[] = [
            'name' => "Programming",
            'parent_id' => 0,
        ];

        $seeds[] = [
            'name' => "Websites",
            'parent_id' => 1,
        ];

        $seeds[] = [
            'name' => "Community",
            'parent_id' => 0,
        ];

        DB::table('categories')->insert($seeds);
    }
}
