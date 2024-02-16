<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Speciality;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Database\Seeders\SpecialitySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(SpecialitySeeder::class);
        $this->call(DrugSeeder::class);

        \App\Models\User::factory(20)->create()->each(function ($user) {
            $role = Role::find(3);
            $user->assignRole($role);
        });;

        \App\Models\User::factory(20)->create()->each(function ($user) {
            $role = Role::find(2);
            $user->assignRole($role);
        });;

        \App\Models\Doctor::factory(20)->create();
        \App\Models\Patient::factory(20)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
