<?php
namespace Database\Seeders;
 
use App\Models\Driver;
use Illuminate\Database\Seeder;

class DriversTableSeeder extends Seeder
{
    private $numberOfDrivers = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->table(['Drivers table seeder notice'], [
            ['Edit this file to change the number of Drivers created'],
        ]);

        $this->command->info('Creating ' . $this->numberOfDrivers . ' Drivers ...');
        $bar = $this->command->getOutput()->createProgressBar($this->numberOfDrivers);

        for ($i = 0; $i < $this->numberOfDrivers; ++$i) {
            factory(Driver::class)->create();
            $bar->advance();
        }

        $bar->finish();
        $this->command->info('');
    }
}
