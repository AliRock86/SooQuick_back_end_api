<?php
namespace Database\Seeders;
 
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model; 

class CountriesTableSeeder extends Seeder
{
    private $numberOfCountries = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            ['country_name' => 'iraq','country_name_ar' => 'العراق'],
            ['country_name' => 'qater','country_name_ar' => 'قطر'],
        ]);
    }
}
