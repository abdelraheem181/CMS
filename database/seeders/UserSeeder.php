<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'id' => 1,
            'name' => "Abdelraheem Mohammed",
            'email' => "abdelraheem181@gmail.com",
            'email_verified_at' => now(),
            'password' => bcrypt('abdel@181'),
            'role_id' => 1
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => "Murtada Mohammed",
            'email' => "murtada@gmail.com",
            'email_verified_at' => now(),
            'password' => bcrypt('murtada@181'),
            'role_id' => 2
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'name' => "Essam Mohammed",
            'email' => "essam@gmail.com",
            'email_verified_at' => now(),
            'password' => bcrypt('essam@181'),
            'role_id' => 2
        ]);

        DB::table('users')->insert([
            'id' => 4,
            'name' => "Ahmed Mohammed",
            'email' => "ahmed@gmail.com",
            'email_verified_at' => now(),
            'password' => bcrypt('ahmed@181'),
            'role_id' => 2
        ]);
    }
}
