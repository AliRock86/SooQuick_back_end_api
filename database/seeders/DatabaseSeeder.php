<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CountriesTableSeeder::class,
            ProvincesTableSeeder::class,
            RegionsTableSeeder::class,
            PermisionsTableSeeder::class,
            RolesTableSeeder::class,
            StatusTypesTableSeeder::class,
            StatusesTableSeeder::class,
            ]);
    }
}
