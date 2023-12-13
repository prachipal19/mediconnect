<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('doctors')->insert([
            [
                'email' => 'doctor1@mediconnect.com',
                'name' => 'Dr. Smith',
                'password' => Hash::make('doctorpassword1'),
                'nic' => '123456789',
                'telephone' => '1234567890',
                'specialty_id' => 1,
            ],
            [
                'email' => 'doctor2@mediconnect.com',
                'name' => 'Dr. Johnson',
                'password' => Hash::make('doctorpassword2'),
                'nic' => '987654321',
                'telephone' => '1234543212',
                'specialty_id' => 2,
            ],
           
        ]);
    }
}
