<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WebusersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('webusers')->insert([
            [
                'email' => 'admin@mediconnect.com',
                'password' => Hash::make('password1'),
                'user_type' => 'a'
            ],
            [
                'email' => 'doctor1@mediconnect.com',
                'password' => Hash::make('doctorpassword1'),
                'user_type' => 'd'
            ],
            [
                'email' => 'patient1@gmail.com',
                'password' => Hash::make('patientpassword1'),
                'user_type' => 'p'
            ],
            [
                'email' => 'patient2@gmail.com',
                'password' => Hash::make('patientpassword2'),
                'user_type' => 'p'
            ],
            [
                'email' => 'doctor2@mediconnect.com',
                'password' => Hash::make('doctorpassword2'),
                'user_type' => 'd'
            ],
        ]);
    }
}
