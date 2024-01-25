<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MiniShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mini_shops')->insert([
            'likes_price' => 1,
            'comments_price' => 2,
            'shares_price' => 3,
            'saves_price' => 4,
        ]);
    }
}
