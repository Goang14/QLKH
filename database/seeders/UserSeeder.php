<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $userData=[];
        for($i=0; $i < 1; $i++) {
            $user = [
                'name' => "admin",
                'email' => "admin@example.com",
                'password' => Hash::make('123'),
                'role' => '0',
            ];
            $userData[] = $user;
        }
        DB::table('users')->insert($userData);
    }
}
