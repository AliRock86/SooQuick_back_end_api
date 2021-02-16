<?php
namespace Database\Seeders;
 
use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesTableSeeder extends Seeder
{
    private $numberOfStatuses = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            ['status_type_id' => 1,'status_name' => 'active','status_name_ar' => 'فعال',
            'status_color' => '1555','status_icon' => 'dd_ff'],
            ['status_type_id' => 1,'status_name' => 'unactive','status_name_ar' => 'غير فعال',
            'status_color' => '154f','status_icon' => 'dd_ff'],
            ['status_type_id' => 1,'status_name' => 'bloked','status_name_ar' => 'محضور',
            'status_color' => '154f','status_icon' => 'dd_ff'],
            ['status_type_id' => 2,'status_name' => 'binding','status_name_ar' => 'معلق',
            'status_color' => '#f07821','status_icon' => 'fas fa-clock'],
            ['status_type_id' => 2,'status_name' => 'active','status_name_ar' => 'فعال',
            'status_color' => '1555','status_icon' => 'dd_ff'],
            ['status_type_id' => 2,'status_name' => 'unactive','status_name_ar' => 'غير فعال',
            'status_color' => '154f','status_icon' => 'dd_ff'],
            ['status_type_id' => 3,'status_name' => 'active','status_name_ar' => 'فعال',
            'status_color' => '1555','status_icon' => 'dd_ff'],
            ['status_type_id' => 3,'status_name' => 'unactive','status_name_ar' => 'غير فعال',
            'status_color' => '154f','status_icon' => 'dd_ff'],
            ['status_type_id' => 4,'status_name' => 'awaiting','status_name_ar' => 'أنتضار',
            'status_color' => '1555','status_icon' => 'dd_ff'],
            ['status_type_id' => 4,'status_name' => 'took','status_name_ar' => 'أخذ من التاجر',
            'status_color' => 'green','status_icon' => 'fas fa-check'],
            ['status_type_id' => 4,'status_name' => 'companyDelivered','status_name_ar' => ' تم الاستلام من الشركة',
            'status_color' => '154f','status_icon' => 'dd_ff'],
            ['status_type_id' => 4,'status_name' => 'underDelivery','status_name_ar' => 'قيد التسليم للزبون',
            'status_color' => '154f','status_icon' => 'fas fa-times-circle'],
            ['status_type_id' => 4,'status_name' => 'ownerReject','status_name_ar' => 'الغاء بواسطة التاجر',
            'status_color' => 'red','status_icon' => 'fas fa-times-circle'],
            ['status_type_id' => 4,'status_name' => 'customerReject','status_name_ar' => 'الغاء بواسطة الزبون',
            'status_color' => 'red','status_icon' => 'fas fa-times-circle'],
            ['status_type_id' => 4,'status_name' => 'deliverd','status_name_ar' => 'تم التسليم',
            'status_color' => 'green','status_icon' => 'fas fa-check'],
            ['status_type_id' => 5,'status_name' => 'active','status_name_ar' => 'فعال',
            'status_color' => '154f','status_icon' => 'dd_ff'],
            ['status_type_id' => 5,'status_name' => 'unactive','status_name_ar' => 'غير فعال',
            'status_color' => '154f','status_icon' => 'dd_ff'],
            ['status_type_id' => 6,'status_name' => 'active','status_name_ar' => 'فعال',
            'status_color' => '154f','status_icon' => 'dd_ff'],
            ['status_type_id' => 6,'status_name' => 'unactive','status_name_ar' => 'غير فعال',
            'status_color' => '154f','status_icon' => 'dd_ff'],
            ['status_type_id' => 7,'status_name' => 'active','status_name_ar' => ' فعال',
            'status_color' => '154f','status_icon' => 'dd_ff'],
            ['status_type_id' => 7,'status_name' => 'unactive','status_name_ar' => 'غير فعال ',
            'status_color' => '154f','status_icon' => 'dd_ff'],
            ['status_type_id' => 8,'status_name' => 'bind','status_name_ar' => 'معلق ',
            'status_color' => '154f','status_icon' => 'dd_ff'],
        ]);
    }
}
