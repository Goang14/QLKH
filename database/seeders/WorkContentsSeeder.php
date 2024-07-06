<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class WorkContentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workContents = [];
        $dataCSV = getDataFromCSV('csv/project_Work_Code_list.csv');

        // Loop $dataCSV and format data insert into $workContents
        foreach ($dataCSV as $data) {
            $workContentsData = [
                'name_vi' => $data[0],
                'name_jp' => $data[1],
                'code' => $data[4],
                'note_vi' => $data[2],
                'note_jp' => $data[3],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            // Push this array onto $workContents
            $workContents[] = $workContentsData;
        }

        DB::table('work_contents')->insert($workContents);
    }
}
