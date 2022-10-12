<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            'name' => 'Xiaomi Redmi Note 8',
            'price' => 160.5,
            'created_at' => Carbon::now()
        ]);
        DB::table('product')->insert([
            'name' => 'Xiaomi Redmi Note 8 Pro',
            'price' => 190.0,
            'created_at' => Carbon::now()
        ]);
        DB::table('product')->insert([
            'name' => 'Xiaomi Redmi Note 9',
            'price' => 170.5,
            'created_at' => Carbon::now()
        ]);
        DB::table('product')->insert([
            'name' => 'Xiaomi Redmi Note 9s',
            'price' => 180,
            'created_at' => Carbon::now()
        ]);
        DB::table('product')->insert([
            'name' => 'Xiaomi Redmi Note 9 Pro',
            'price' => 200,
            'created_at' => Carbon::now()
        ]);

    }
}
