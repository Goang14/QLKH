<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateNameViInIndirectTasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $updates = [
            8 => '21_Nghỉ phép(có lương)',
            12 => '25_Nghỉ(ko lương)',
        ];
        foreach ($updates as $id => $name_vi) {
            DB::table('indirect_tasks')
                ->where('id', $id)
                ->update(['name_vi' => $name_vi]);
        }
    }
}
