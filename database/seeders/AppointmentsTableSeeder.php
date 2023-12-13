<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('appointments')->insert([
            ['patient_id' => 1, 'appointment_number' => 1, 'schedule_id' => 1, 'appointment_date' => '2023-12-20'],
            ['patient_id' => 2, 'appointment_number' => 1, 'schedule_id' => 2, 'appointment_date' => '2023-12-21'],
         
        ]);
    }
}
