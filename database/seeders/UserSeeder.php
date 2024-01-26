<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Sergiu Strugariu',
            'email' => 'fkecqyc2a@mozmail.com',
            'password' => Hash::make('Sergiu1234'),
        ]);
    }
}
