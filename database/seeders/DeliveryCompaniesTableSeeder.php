<?php
namespace Database\Seeders;
 
use App\Models\DeliveryCompany;
use Illuminate\Database\Seeder;

class DeliveryCompaniesTableSeeder extends Seeder
{
    private $numberOfDeliveryCompanies = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->table(['DeliveryCompanies table seeder notice'], [
            ['Edit this file to change the number of DeliveryCompanies created'],
        ]);

        $this->command->info('Creating ' . $this->numberOfDeliveryCompanies . ' DeliveryCompanies ...');
        $bar = $this->command->getOutput()->createProgressBar($this->numberOfDeliveryCompanies);

        for ($i = 0; $i < $this->numberOfDeliveryCompanies; ++$i) {
            factory(DeliveryCompany::class)->create();
            $bar->advance();
        }

        $bar->finish();
        $this->command->info('');
    }
}
