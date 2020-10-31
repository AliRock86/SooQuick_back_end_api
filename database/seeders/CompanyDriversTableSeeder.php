<?php

namespace Database\Seeders;

use App\Models\CompanyDrivers;
use Illuminate\Database\Seeder;

class CompanyDriversTableSeeder extends Seeder
{
    private $numberOfCompanyDrivers = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->table(['CompanyDrivers table seeder notice'], [
            ['Edit this file to change the number of CompanyDrivers created'],
        ]);

        $this->command->info('Creating ' . $this->numberOfCompanyDrivers . ' CompanyDrivers ...');
        $bar = $this->command->getOutput()->createProgressBar($this->numberOfCompanyDrivers);

        for ($i = 0; $i < $this->numberOfCompanyDrivers; ++$i) {
            CompanyDrivers::factory()->create();
            $bar->advance();
        }

        $bar->finish();
        $this->command->info('');
    }
}
