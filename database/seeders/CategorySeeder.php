<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
       
        DB::table('categories')->insert([
            'title' => 'سياسة',
            'slug' => 'سياسة',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('categories')->insert([
            'title' => 'اقتصاد',
            'slug' => 'اقتصاد',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('categories')->insert([
            'title' => 'دين',
            'slug' => 'دين',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('categories')->insert([
            'title' => 'ثقافة',
            'slug' => 'ثقافة',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
