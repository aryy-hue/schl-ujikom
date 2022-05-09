<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama' => 'admin',
            'nik' => 'admin',
            'negara' => 'indonesia',
            'img' => 'img/user.png',
            'role' => 'admin',
            'email' => 'admin',
            'password' => bcrypt('admin')
        ]);
    }
}
