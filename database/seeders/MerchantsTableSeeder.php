<?php
namespace Database\Seeders;
 
use App\Models\Merchant;
use Illuminate\Database\Seeder;

class MerchantsTableSeeder extends Seeder
{
    private $numberOfMerchants = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->table(['Merchants table seeder notice'], [
            ['Edit this file to change the number of Merchants created'],
        ]);

        $this->command->info('Creating ' . $this->numberOfMerchants . ' Merchants ...');
        $bar = $this->command->getOutput()->createProgressBar($this->numberOfMerchants);

        for ($i = 0; $i < $this->numberOfMerchants; ++$i) {
            factory(Merchant::class)->create();
            $bar->advance();
        }

        $bar->finish();
        $this->command->info('');
    }
}
