<?php

namespace Database\Seeders;

use App\Models\Wallet;
use Illuminate\Database\Seeder;

class WalletsTableSeeder extends Seeder
{
    private $numberOfWallets = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->table(['Wallets table seeder notice'], [
            ['Edit this file to change the number of Wallets created'],
        ]);

        $this->command->info('Creating ' . $this->numberOfWallets . ' Wallets ...');
        $bar = $this->command->getOutput()->createProgressBar($this->numberOfWallets);

        for ($i = 0; $i < $this->numberOfWallets; ++$i) {
            Wallet::factory()->create();
            $bar->advance();
        }

        $bar->finish();
        $this->command->info('');
    }
}
