<?php
namespace Database\Seeders;
 
use App\Models\DeliveryDrivers;
use Illuminate\Database\Seeder;

class DeliveryDriversTableSeeder extends Seeder
{
    private $numberOfDeliveryDrivers = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->table(['DeliveryDrivers table seeder notice'], [
            ['Edit this file to change the number of DeliveryDrivers created'],
        ]);

        $this->command->info('Creating ' . $this->numberOfDeliveryDrivers . ' DeliveryDrivers ...');
        $bar = $this->command->getOutput()->createProgressBar($this->numberOfDeliveryDrivers);

        for ($i = 0; $i < $this->numberOfDeliveryDrivers; ++$i) {
            factory(DeliveryDrivers::class)->create();
            $bar->advance();
        }

        $bar->finish();
        $this->command->info('');
    }
}
