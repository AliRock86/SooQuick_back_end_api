<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{
    private $numberOfTransactions = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->table(['Transactions table seeder notice'], [
            ['Edit this file to change the number of Transactions created'],
        ]);

        $this->command->info('Creating ' . $this->numberOfTransactions . ' Transactions ...');
        $bar = $this->command->getOutput()->createProgressBar($this->numberOfTransactions);

        for ($i = 0; $i < $this->numberOfTransactions; ++$i) {
            Transaction::factory()->create();
            $bar->advance();
        }

        $bar->finish();
        $this->command->info('');
    }
}
