<?php

namespace Database\Seeders;

use App\Models\DefectiveSchedule;
use Illuminate\Database\Seeder;

class DefectiveScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $d1 = new DefectiveSchedule;
        $d1->defective_id='1';
        $d1->schedule_id='1';
        $d1->quantity='2';

        $d2 = new DefectiveSchedule;
        $d2->defective_id='2';
        $d2->schedule_id='2';
        $d2->quantity='1';

        $d3 = new DefectiveSchedule;
        $d3->defective_id='3';
        $d3->schedule_id='3';
        $d3->quantity='5';

        $d4 = new DefectiveSchedule;
        $d4->defective_id='4';
        $d4->schedule_id='4';
        $d4->quantity='3';

        $D = [$d1,$d2,$d3,$d4];
        foreach($D as $d){
            $d->save();
        }
    }
}
