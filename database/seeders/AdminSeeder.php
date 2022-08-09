<?php

namespace Database\Seeders;

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
        DB::table('admins')->insert([
            'name' => "Poison Admin",
            'username' => "admin",
            'password' => bcrypt(102030),
            'mail' => "info@impalasoftware.co",
            'number' => "5455258612",
            'image' => "https://source.unsplash.com/random",
        ]);
    }
}
