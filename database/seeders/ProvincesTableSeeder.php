<?php
namespace Database\Seeders;
 
use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesTableSeeder extends Seeder
{
    private $numberOfProvinces = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->insert([
            ['country_id' => '1','province_name'=> 'baghdad','province_name_ar'=> 'بغداد'],
            ['country_id' => '1','province_name'=> 'karbla','province_name_ar'=> 'كربلاء'],
            ['country_id' => '1','province_name'=> 'nejaf','province_name_ar'=> 'نجف'],
            ['country_id' => '1','province_name'=> 'bable','province_name_ar'=> 'بابل'],
            ['country_id' => '1','province_name'=> 'smawa','province_name_ar'=> 'سماوة'],
            ['country_id' => '1','province_name'=> 'kadsia','province_name_ar'=> 'القادسية'],
            ['country_id' => '1','province_name'=> 'basera','province_name_ar'=> 'البصرة'],
            ['country_id' => '1','province_name'=> 'diala','province_name_ar'=> 'ديالى'],
            ['country_id' => '1','province_name'=> 'anbar','province_name_ar'=> 'انبار'],
            ['country_id' => '1','province_name'=> 'kirkuk','province_name_ar'=> 'كركوك'],
            ['country_id' => '1','province_name'=> 'slah al den','province_name_ar'=> 'صلاح الدين'],
            ['country_id' => '1','province_name'=> 'zako','province_name_ar'=> 'زاخو'],
            ['country_id' => '1','province_name'=> 'sulimania','province_name_ar'=> 'السليمانية'],
            ['country_id' => '1','province_name'=> 'arbeel','province_name_ar'=> 'اربيل'],
            ['country_id' => '1','province_name'=> 'dehook','province_name_ar'=> 'دهوك'],
            ['country_id' => '1','province_name'=> 'mousul','province_name_ar'=> 'موصل'],
            ['country_id' => '1','province_name'=> 'wast','province_name_ar'=> 'بغداد'],
            ['country_id' => '1','province_name'=> 'meissan','province_name_ar'=> 'ميسان'],
        ]);
    }
}
