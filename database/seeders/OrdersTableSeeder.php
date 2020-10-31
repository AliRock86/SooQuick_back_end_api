<?php
namespace Database\Seeders;
 
use App\Models\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    private $numberOfOrders = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->table(['Orders table seeder notice'], [
            ['Edit this file to change the number of Orders created'],
        ]);

        $this->command->info('Creating ' . $this->numberOfOrders . ' Orders ...');
        $bar = $this->command->getOutput()->createProgressBar($this->numberOfOrders);

        for ($i = 0; $i < $this->numberOfOrders; ++$i) {
            factory(Order::class)->create();
            $bar->advance();
        }

        $bar->finish();
        $this->command->info('');
    }
}
