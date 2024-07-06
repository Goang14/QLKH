<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            ['name' => 'Manager'],
            ['name' => 'Developer'],
            ['name' => 'Tester'],
            ['name' => 'Communicator'],
            ['name' => 'Accountant'],
            ['name' => 'Sales'],
            ['name' => 'Consultant'],
            ['name' => 'BizDev'],
            ['name' => 'Intern'],
        ];

        Position::insert($positions);
    }
}
