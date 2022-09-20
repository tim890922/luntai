<?php

namespace Database\Seeders;

use App\Models\DefectiveReport;
use Illuminate\Database\Seeder;

class DefectiveReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $d1 = new DefectiveReport();
        $d1->defective_id='1';
        $d1->report_id='1';
        $d1->quantity='2';
        $d1->detail='黑點異常';

        $d2 = new DefectiveReport();
        $d2->defective_id='2';
        $d2->report_id='1';
        $d2->quantity='1';
        $d2->detail='缺料異常';


        $D = [$d1,$d2];
        foreach($D as $d){
            $d->save();
        }
    }
}
