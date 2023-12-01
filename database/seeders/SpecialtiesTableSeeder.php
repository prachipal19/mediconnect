<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('specialties')->insert([
            ['id' => 1, 'name' => 'Cardiology'],
            ['id' => 2, 'name' => 'Dermatology'],
            ['id' => 3, 'name' => 'Orthopedics'],
            ['id' => 4, 'name' => 'Oncology'],
            ['id' => 5, 'name' => 'Pediatrics'],
            ['id' => 6, 'name' => 'Neurology'],
            ['id' => 7, 'name' => 'Gastroenterology'],
            ['id' => 8, 'name' => 'Endocrinology'],
            ['id' => 9, 'name' => 'Rheumatology'],
            ['id' => 10, 'name' => 'Urology'],
            ['id' => 11, 'name' => 'Ophthalmology'],
            ['id' => 12, 'name' => 'Pulmonology'],
            ['id' => 13, 'name' => 'Dentistry'],
            ['id' => 14, 'name' => 'Psychiatry'],
            ['id' => 15, 'name' => 'Dermatopathology'],
            ['id' => 16, 'name' => 'Radiology'],
            ['id' => 17, 'name' => 'Anesthesiology'],
            ['id' => 18, 'name' => 'Obstetrics and Gynecology'],
            ['id' => 19, 'name' => 'Pathology'],
            ['id' => 20, 'name' => 'Hematology'],
            ['id' => 21, 'name' => 'Nephrology'],
            ['id' => 22, 'name' => 'Geriatrics'],
            ['id' => 23, 'name' => 'Infectious Disease'],
            ['id' => 24, 'name' => 'Allergy and Immunology'],
            ['id' => 25, 'name' => 'Physical Medicine and Rehabilitation'],
            ['id' => 26, 'name' => 'Sports Medicine'],
            ['id' => 27, 'name' => 'Emergency Medicine'],
            ['id' => 28, 'name' => 'Family Medicine'],
            ['id' => 29, 'name' => 'Internal Medicine'],
            ['id' => 30, 'name' => 'General Surgery']
        ]);
    }
}
