<?php

namespace Database\Seeders;

use App\Models\Drug;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DrugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Drug::create([
            'name' => 'scondown',
            'speciality_id' => 5,
        ]);
        Drug::create([
            'name' => 'genosuirc',
            'speciality_id' => 5,
        ]);
        Drug::create([
            'name' => 'norocarex',
            'speciality_id' => 3,
        ]);
        Drug::create([
            'name' => 'pherocoromon',
            'speciality_id' => 2,
        ]);
        Drug::create([
            'name' => 'pheromone',
            'speciality_id' => 6,
        ]);
        Drug::create([
            'name' => 'neropheronomal',
            'speciality_id' => 5,
        ]);
        Drug::create([
            'name' => 'peroxeular',
            'speciality_id' => 1,
        ]);
        Drug::create([
            'name' => 'consetcur',
            'speciality_id' => 1,
        ]);
        Drug::create([
            'name' => 'parofematal',
            'speciality_id' => 1,
        ]);
        
    }
}
