<?php

namespace Database\Seeders;

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
            'name' => 'Ajmul Haque',
            'email' => 'ajmul@ajkerbikebazar.com',
            'password' => bcrypt(12345678),
            'status' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'ruhulameen',
            'email' => 'ruhul@ajkerbikebazar.com',
            'password' => bcrypt(12345678),
            'status' => '1',
        ]);
    }
}
