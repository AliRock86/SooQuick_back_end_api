<?php
namespace Database\Seeders;
 
use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    private $numberOfCustomers = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->table(['Customers table seeder notice'], [
            ['Edit this file to change the number of Customers created'],
        ]);

        $this->command->info('Creating ' . $this->numberOfCustomers . ' Customers ...');
        $bar = $this->command->getOutput()->createProgressBar($this->numberOfCustomers);

        for ($i = 0; $i < $this->numberOfCustomers; ++$i) {
            factory(Customer::class)->create();
            $bar->advance();
        }

        $bar->finish();
        $this->command->info('');
    }
}
