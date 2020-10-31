<?php

namespace Database\Seeders;

use App\Models\test;
use Illuminate\Database\Seeder;

class testsTableSeeder extends Seeder
{
    private $numberOftests = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->table(['tests table seeder notice'], [
            ['Edit this file to change the number of tests created'],
        ]);

        $this->command->info('Creating ' . $this->numberOftests . ' tests ...');
        $bar = $this->command->getOutput()->createProgressBar($this->numberOftests);

        for ($i = 0; $i < $this->numberOftests; ++$i) {
            test::factory()->create();
            $bar->advance();
        }

        $bar->finish();
        $this->command->info('');
    }
}
