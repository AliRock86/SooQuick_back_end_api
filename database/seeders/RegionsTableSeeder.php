<?php
namespace Database\Seeders;
 
use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsTableSeeder extends Seeder
{
    private $numberOfRegions = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            ['province_id' => '1','region_name'=> 'السيدية','region_name_ar'=> 'السيدية'],
            ['province_id' => '1','region_name'=> 'الاعلام','region_name_ar'=> 'السيدية'],
            ['province_id' => '1','region_name'=> 'البياع','region_name_ar'=> 'السيدية'],
            ['province_id' => '1','region_name'=> 'الجهاد','region_name_ar'=> 'السيدية'],
            ['province_id' => '1','region_name'=> 'التراث','region_name_ar'=> 'السيدية'],
            ['province_id' => '1','region_name'=> 'المعارف','region_name_ar'=> 'السيدية'],
            ['province_id' => '1','region_name'=> 'aaa','region_name_ar'=> 'السيدية'],
            ['province_id' => '1','region_name'=> 'www','region_name_ar'=> 'السيدية'],
            ['province_id' => '1','region_name'=> 'asd','region_name_ar'=> 'السيدية'],
            ['province_id' => '1','region_name'=> 'rt','region_name_ar'=> 'السيدية'],
            ['province_id' => '1','region_name'=> '3434','region_name_ar'=> 'السيدية'],
            ['province_id' => '1','region_name'=> '3444','region_name_ar'=> 'السيدية'],
            ['province_id' => '1','region_name'=> '565','region_name_ar'=> 'السيدية'],
            ['province_id' => '1','region_name'=> 'fghgf','region_name_ar'=> 'السيدية'],
            ['province_id' => '1','region_name'=> 'hghkg','region_name_ar'=> 'السيدية'],
            ['province_id' => '1','region_name'=> 'jkjk','region_name_ar'=> 'السيدية'],
            ['province_id' => '1','region_name'=> '12d','region_name_ar'=> 'السيدية'],
            ['province_id' => '1','region_name'=> 'cvcv','region_name_ar'=> 'السيدية'],
        ]);
    }
}
