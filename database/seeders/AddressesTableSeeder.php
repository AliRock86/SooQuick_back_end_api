<?php
namespace Database\Seeders;
 
use App\Models\Address;
use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    private $numberOfAddresses = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->table(['Addresses table seeder notice'], [
            ['Edit this file to change the number of Addresses created'],
        ]);

        $this->command->info('Creating ' . $this->numberOfAddresses . ' Addresses ...');
        $bar = $this->command->getOutput()->createProgressBar($this->numberOfAddresses);

        for ($i = 0; $i < $this->numberOfAddresses; ++$i) {
            factory(Address::class)->create();
            $bar->advance();
        }

        $bar->finish();
        $this->command->info('');
    }
}
