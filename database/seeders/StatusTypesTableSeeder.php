<?php
namespace Database\Seeders;
 
use App\Models\StatusType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTypesTableSeeder extends Seeder
{
    private $numberOfStatusTypes = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_types')->insert([
            ['status_type_name' => 'user'],
            ['status_type_name' => 'merchant'],
            ['status_type_name' => 'delivery company'],
            ['status_type_name' => 'order'],
            ['status_type_name' => 'driver'],
            ['status_type_name' => 'offer'],
        ]);
    }
}
