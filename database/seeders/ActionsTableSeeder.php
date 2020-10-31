<?php
namespace Database\Seeders;
 
use App\Models\Action;
use Illuminate\Database\Seeder;

class ActionsTableSeeder extends Seeder
{
    private $numberOfActions = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->table(['Actions table seeder notice'], [
            ['Edit this file to change the number of Actions created'],
        ]);

        $this->command->info('Creating ' . $this->numberOfActions . ' Actions ...');
        $bar = $this->command->getOutput()->createProgressBar($this->numberOfActions);

        for ($i = 0; $i < $this->numberOfActions; ++$i) {
            factory(Action::class)->create();
            $bar->advance();
        }

        $bar->finish();
        $this->command->info('');
    }
}
