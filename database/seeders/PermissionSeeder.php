<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        DB::table('permissions')->insert([
            'id' => 1,
            'name' => 'add-post',
            'desc' => 'اضافة المواضيع',
        ]);

        DB::table('permissions')->insert([
            'id' => 2,
            'name' => 'udate-post',
            'desc' => 'تعديل المواضيع',
        ]);

        DB::table('permissions')->insert([
            'id' => 3,
            'name' => 'delete-post',
            'desc' => 'حذف المواضيع',
        ]);

        DB::table('permissions')->insert([
            'id' => 4,
            'name' => 'add-user',
            'desc' => 'اضافة المستخدمين',
        ]);

        DB::table('permissions')->insert([
            'id' => 5,
            'name' => 'update-user',
            'desc' => 'تعديل المستخدمين',
        ]);

        DB::table('permissions')->insert([
            'id' => 6,
            'name' => 'delete-user',
            'desc' => ' حذف المستخدمين',
        ]);
    }
}
