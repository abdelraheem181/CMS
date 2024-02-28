<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('comments')->insert([
            'body' =>"مقال ممتاز",
            'post_id' => "1",
            'user_id' => "2",
            'created_at' => '2023-07-05 05:08:00',
            'commentable_id' => "1",
            'commentable_type' => "App\Models\Post",

        ]);

        
        DB::table('comments')->insert([
            'body' =>"مقال ممتاز",
            'post_id' => "2",
            'user_id' => "1",
            'created_at' => '2022-07-05 05:08:00',
            'commentable_id' => "2",
            'commentable_type' => "App\Models\Post",

        ]);

              
        DB::table('comments')->insert([
            'body' =>"مقال جيد",
            'post_id' => "3",
            'user_id' => "3",
            'created_at' => '2022-09-05 05:08:00',
            'commentable_id' => "3",
            'commentable_type' => "App\Models\Post",

        ]);

        DB::table('comments')->insert([
            'body' =>"مقال جيد",
            'post_id' => "4",
            'user_id' => "4",
            'created_at' => '2023-02-05 05:08:00',
            'commentable_id' => "4",
            'commentable_type' => "App\Models\Post",

        ]);
    }
}
