<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds[] = [
            'post_id' => 1,
            'tag_id' => 1,
        ];

        $seeds[] = [
            'post_id' => 2,
            'tag_id' => 1,
        ];

        $seeds[] = [
            'post_id' => 3,
            'tag_id' => 1,
        ];

        $seeds[] = [
            'post_id' => 1,
            'tag_id' => 2,
        ];

        $seeds[] = [
            'post_id' => 2,
            'tag_id' => 2,
        ];

        DB::table('post_tags')->insert($seeds);
    }
}
