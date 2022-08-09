<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

use Illuminate\Support\Str;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->insert([
            'title'=>'Poison Dev',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
