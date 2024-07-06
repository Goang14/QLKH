<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndirectTasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $indirectTasks = [];
        $dataCSV = getDataFromCSV('csv/indirect_code_list.csv');

        // Loop $dataCSV and format data insert into $indirectTasks
        foreach ($dataCSV as $data) {
            $indirectTasksData = [
                'name_vi' => $data[1],
                'name_jp' => $data[0],
                'code' => $data[4],
                'note_vi' => $data[2],
                'note_jp' => $data[3],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            // Push this array onto $listIndirectTasks
            $indirectTasks[] = $indirectTasksData;
        }

        DB::table('indirect_tasks')->insert($indirectTasks);
    }
}
