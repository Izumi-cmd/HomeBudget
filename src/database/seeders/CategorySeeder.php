<?php

namespace Database\Seeders;

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
            ['name' => '趣味'],
            ['name' => '交際費'],
            ['name' => '食費'],
            ['name' => '外食費'],
            ['name' => '光熱費'],
            ['name' => '水道費'],
            ['name' => '家賃'],
            ['name' => '通信費'],
        ]);
    }
}
