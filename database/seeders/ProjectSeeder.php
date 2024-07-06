<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();

        try {
            DB::table('business_customers')->insert([
                [
                    'id' => 1,
                    'customer_code' => '220401',
                    'name' => 'SankeiBizCon',
                    'note' => '',
                    'created_at' => now()
                ],
                [
                    'id' => 2,
                    'customer_code' => '240401',
                    'name' => 'Grand2',
                    'note' => '',
                    'created_at' => now()
                ],
                [
                    'id' => 3,
                    'customer_code' => '240402',
                    'name' => 'Vinh',
                    'note' => '',
                    'created_at' => now()
                ]
            ]);

            DB::table('projects')->insert([
                [
                    'id' => 1,
                    'id_customer' => 1,
                    'project_code' => '240101',
                    'name' => 'TGD_24_1Q',
                    'status' => 2,
                    'created_at' => now(),
                ],
                [
                    'id' => 2,
                    'id_customer' => 1,
                    'project_code' => '240102',
                    'name' => 'Application Management System_24_2Q',
                    'status' => 2,
                    'created_at' => now(),
                ],
                [
                    'id' => 3,
                    'id_customer' => 2,
                    'project_code' => '240401',
                    'name' => 'Grand2',
                    'status' => 1,
                    'created_at' => now(),
                ],
                [
                    'id' => 4,
                    'id_customer' => 3,
                    'project_code' => '240402',
                    'name' => 'AWS_Training_Project',
                    'status' => 2,
                    'created_at' => now(),
                ],
                [
                    'id' => 5,
                    'id_customer' => 3,
                    'project_code' => '240403',
                    'name' => 'AI_Training_Project',
                    'status' => 2,
                    'created_at' => now(),
                ],
                [
                    'id' => 6,
                    'id_customer' => 3,
                    'project_code' => '240404',
                    'name' => 'Japanese_Training_Project',
                    'status' => 2,
                    'created_at' => now(),
                ],
                [
                    'id' => 7,
                    'id_customer' => 1,
                    'project_code' => '240501',
                    'name' => 'TGD_24_2Q',
                    'status' => 2,
                    'created_at' => now(),
                ],
                [
                    'id' => 8,
                    'id_customer' => 1,
                    'project_code' => '240502',
                    'name' => 'Application Management System_24_2Q',
                    'status' => 2,
                    'created_at' => now(),
                ]
            ]);

            DB::table('member_projects')->insert([
                [
                    'id' => 1,
                    'id_project' => 1,
                    'id_user' => 9,
                    'position' => 1,
                    'created_at' => now(),
                ],
                [
                    'id' => 2,
                    'id_project' => 2,
                    'id_user' => 9,
                    'position' => 1,
                    'created_at' => now(),
                ],
                [
                    'id' => 3,
                    'id_project' => 3,
                    'id_user' => 3,
                    'position' => 1,
                    'created_at' => now(),
                ],
                [
                    'id' => 4,
                    'id_project' => 4,
                    'id_user' => 3,
                    'position' => 1,
                    'created_at' => now(),
                ],
                [
                    'id' => 5,
                    'id_project' => 5,
                    'id_user' => 3,
                    'position' => 1,
                    'created_at' => now(),
                ],
                [
                    'id' => 6,
                    'id_project' => 6,
                    'id_user' => 26,
                    'position' => 1,
                    'created_at' => now(),
                ],
                [
                    'id' => 7,
                    'id_project' => 7,
                    'id_user' => 9,
                    'position' => 1,
                    'created_at' => now(),
                ],
                [
                    'id' => 8,
                    'id_project' => 8,
                    'id_user' => 9,
                    'position' => 1,
                    'created_at' => now(),
                ]
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}