<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Admin as ModelsAdmin;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            ['name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=> bcrypt('khan123456')],
            [
                'name'=>'waleed',
                'email'=>'w@gmail.com',
                'password'=>bcrypt('khan1234'),
            ],

            ]);
    }
}
