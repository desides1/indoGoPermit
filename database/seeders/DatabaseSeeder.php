<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            PermissionTypeSeeder::class,
            LocationSeeder::class,
            PermitTypeSeeder::class,
            RequestNumberSeeder::class,
            ProvinceSeeder::class,
            CitySeeder::class,
            SubdistricSeeder::class,
            IndividualSeeder::class,
            BussinessEntitySeeder::class,
            ProjectSeeder::class,
            RequirementSeeder::class,
            DocumentRequirementSeeder::class,
            RequestSeeder::class,
            PerizinanSeeder::class,
        ]);
    }
}
