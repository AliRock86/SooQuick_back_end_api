<?php
namespace Database\Seeders;
 
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    private $numberOfRoles = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['role_name' => 'merchant'],
            ['role_name' => 'delivery company'],
            ['role_name' => 'driver'],
            ['role_name' => 'operation'],
            ['role_name' => 'admin'],
            ['role_name' => 'customer'],
        ]);
    }
}
