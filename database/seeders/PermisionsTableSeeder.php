<?php
namespace Database\Seeders;
 
use App\Models\Permision;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisionsTableSeeder extends Seeder
{
    private $numberOfPermisions = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permisions')->insert([
            ['permision_name' => 'full'],
            ['permision_name' => 'read'],
            ['permision_name' => 'write'],
        ]);
    }
}
