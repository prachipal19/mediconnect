<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('patients')->insert([
            [
                'email' => 'patient1@gmail.com',
                'name' => 'John Doe',
                'password' => Hash::make('patientpassword1'),
                'address' => '123 Main St',
                'nic' => '555555555',
                'date_of_birth' => '1990-01-15',
                'telephone' => '555-555-5555',
            ],
            [
                'email' => 'patient2@gmail.com',
                'name' => 'Jane Smith',
                'password' => Hash::make('patientpassword2'),
                'address' => '456 Elm St',
                'nic' => '666666666',
                'date_of_birth' => '1985-08-22',
                'telephone' => '666-666-6666',
            ],

        ]);
    }
}
