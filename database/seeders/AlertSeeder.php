<?php

namespace Database\Seeders;

use App\Models\Alert;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $alert1 = Alert::create([
            'user_id' => User::where('name' , 'Abdelraheem Mohammed')->first()->id,
            'alert' => '4',
        ]);

        $alert2 = Alert::create([
            'user_id' => User::where('name' , 'Murtada Mohammed')->first()->id,
            'alert' => '3',
        ]);

        $alert3 = Alert::create([
            'user_id' => User::where('name' , 'Essam Mohammed')->first()->id,
            'alert' => '2',
        ]);

        $alert4 = Alert::create([
            'user_id' => User::where('name' , 'Ahmed Mohammed')->first()->id,
            'alert' => '0',
        ]);
    }
}
