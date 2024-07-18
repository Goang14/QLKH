<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Bán hàng'],
            ['name' => 'Bán máy'],
            ['name' => 'Sửa chữa'],
            ['name' => 'Cầm đồ'],
        ];

        DB::table('services')->insert($data);
    }
}
