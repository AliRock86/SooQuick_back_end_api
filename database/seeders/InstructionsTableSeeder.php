<?php
namespace Database\Seeders;
 
use App\Models\Instruction;
use Illuminate\Database\Seeder;

class InstructionsTableSeeder extends Seeder
{
    private $numberOfInstructions = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->table(['Instructions table seeder notice'], [
            ['Edit this file to change the number of Instructions created'],
        ]);

        $this->command->info('Creating ' . $this->numberOfInstructions . ' Instructions ...');
        $bar = $this->command->getOutput()->createProgressBar($this->numberOfInstructions);

        for ($i = 0; $i < $this->numberOfInstructions; ++$i) {
            factory(Instruction::class)->create();
            $bar->advance();
        }

        $bar->finish();
        $this->command->info('');
    }
}
