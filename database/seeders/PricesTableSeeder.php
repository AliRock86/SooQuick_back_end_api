<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Seeder;

class PricesTableSeeder extends Seeder
{
    private $numberOfPrices = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->table(['Prices table seeder notice'], [
            ['Edit this file to change the number of Prices created'],
        ]);

        $this->command->info('Creating ' . $this->numberOfPrices . ' Prices ...');
        $bar = $this->command->getOutput()->createProgressBar($this->numberOfPrices);

        for ($i = 0; $i < $this->numberOfPrices; ++$i) {
            Price::factory()->create();
            $bar->advance();
        }

        $bar->finish();
        $this->command->info('');
    }
}
