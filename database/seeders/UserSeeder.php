<?php

namespace Database\Seeders;

use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listEmployee = [];
        $dataCSV = getDataFromCSV('csv/list_employee.csv');

        // Loop $dataCSV and format data insert into $listEmployee
        foreach ($dataCSV as $data) {
            // convert data position
            switch ($data[1]) {
                case 'Manager':
                    $position = Position::MANAGER;
                    break;
                case 'Developer':
                    $position = Position::DEVELOPER;
                    break;
                case 'Tester':
                    $position = Position::TESTER;
                    break;
                case 'Communicator':
                    $position = Position::COMMUNICATOR;
                    break;
                case 'Accountant':
                    $position = Position::ACCOUNTANT;
                    break;
                case 'Sales':
                    $position = Position::SALES;
                    break;
                case 'Intern':
                    $position = Position::INTERN;
                    break;
                default:
                    $position = Position::DEVELOPER;
                    break;
            }

            $employeeData = [
                'employee_code' => $data[2],
                'role' => intval($data[0]),
                'username' => $data[3],
                'email' => $data[5],
                'password' => Hash::make($data[6]),
                'id_position' => $position,
                'sex' => intval($data[7]),
                'language' => intval($data[8]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            // Push this array onto $listEmployee
            $listEmployee[] = $employeeData;
        }

        DB::table('users')->insert($listEmployee);
    }

}
