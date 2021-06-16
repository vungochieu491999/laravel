<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [];

        for ($i = 0; $i < 10 ; $i++) {
            $title = $this->faker->sentence;

            $seeds[] = [
                'title' => $title,
                'slug' => Str::slug($title),
                'description' => $this->faker->paragraph,
                'category_id' => 2,
                'user_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

//        $seeds[] = [
//            'title' => "Vấn đề với SetWindowsHookEx",
//            'slug' => "van-de-voi-setwindowshookex",
//            'description' => "Xin chào mọi người, hiện tại mình đang tìm hiểu về setWindowsHookEx và demo viết một keylogger, theo mình tìm hiểu trên mạng thì code keylogger của người ta như sau:",
//            'category_id' => 2,
//            'user_id' => 1,
//            'created_at' => date('Y-m-d H:i:s'),
//            'updated_at' => date('Y-m-d H:i:s'),
//        ];
//
//        $seeds[] = [
//            'title' => "Tăng tốc website bằng Caching",
//            'slug' => "tang-toc-website-bang-caching",
//            'description' => "Mình có đang tìm hiểu về caching website. Đã đọc qua một số tài liệu mà vẫn cảm thấy mơ hồ quá. Mn ai biết có thể lấy một ví dụ đơn giản về caching ở client và server để mình tham khảo với được không? Tiện thể mong mn chỉ giúp mình cấu hình apache để sử dụng Gzip Compression. Thank!",
//            'category_id' => 2,
//            'user_id' => 1,
//            'created_at' => date('Y-m-d H:i:s'),
//            'updated_at' => date('Y-m-d H:i:s'),
//        ];
//
//        $seeds[] = [
//            'title' => "Nên học Flutter hay react native?",
//            'slug' => "nen-hoc-flutter-hay-react-native",
//            'description' => "Nên học Flutter hay react native? ",
//            'category_id' => 3,
//            'user_id' => 1,
//            'created_at' => date('Y-m-d H:i:s'),
//            'updated_at' => date('Y-m-d H:i:s'),
//        ];

        DB::table('posts')->insert($seeds);
    }
}
