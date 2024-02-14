<?php

namespace Database\Seeders;

use App\Models\Speciality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Speciality::create(['name' => 'Generalist',]);
        Speciality::create(['name' => 'Cardiology',]);
        Speciality::create(['name' => 'Dermatology',]);
        Speciality::create(['name' => 'Gastroenterology',]);
        Speciality::create(['name' => 'Neurology',]);
        Speciality::create(['name' => 'Orthopedics',]);
        Speciality::create(['name' => 'Pediatrics',]);
        Speciality::create(['name' => 'Psychiatry',]);
        Speciality::create(['name' => 'Radiology',]);
        Speciality::create(['name' => 'Oncology',]);
        Speciality::create(['name' => 'Urology',]);
    }
}
