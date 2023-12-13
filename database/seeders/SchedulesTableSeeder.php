<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schedules')->insert([
            ['doctor_id' => 1, 'title' => 'Cardiology Clinic', 'schedule_date' => '2023-12-20', 'schedule_time' => '09:00:00', 'number_of_patients' => 10],
            ['doctor_id' => 2, 'title' => 'Dermatology Clinic', 'schedule_date' => '2023-12-21', 'schedule_time' => '10:30:00', 'number_of_patients' => 8],
           
        ]);
    }
}
