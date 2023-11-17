<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // category
        DB::table('categories')->insert([
            'name' => 'Trái cây nhập khẩu',
        ]);
        DB::table('categories')->insert([
            'name' => 'Trái cây việt',
        ]);
        DB::table('categories')->insert([
            'name' => 'Hạt sấy khô',
        ]);
        // category post
        DB::table('category_posts')->insert([
            'name' => 'Thực phẩm',
        ]);
        DB::table('category_posts')->insert([
            'name' => 'Sức khoẻ',
        ]);
        DB::table('category_posts')->insert([
            'name' => 'Tin tức',
        ]);
    }
}
