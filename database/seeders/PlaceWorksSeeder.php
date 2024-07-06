<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaceWorksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $placeWorks = [];
        $dataCSV = getDataFromCSV('csv/office_Locations.csv');

        // Loop $dataCSV and format data insert into $placeWorks
        foreach ($dataCSV as $data) {
            $placeWorksData = [
                'name_vi' => $data[0],
                'name_jp' => $data[1],
                'code' => $data[2],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            // Push this array onto $placeWorks
            $placeWorks[] = $placeWorksData;
        }

        DB::table('place_works')->insert($placeWorks);
    }
}
