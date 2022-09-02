<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Report;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = new Report;
        $r1->schedule_id='1';
        $r1->product_id='BKEF834V000080';
        $r1->employee_id='A-10';
        $r1->shift='A';
        $r1->time_start='9:00';
        $r1->time_end='10:00';
        $r1->good_product_quantity='120';
        $r1->defective_product_quantity='2';
        $r1->record='FALSE';

        $r2 = new Report;
        $r2->schedule_id='2';
        $r2->product_id='B8RF474A00P080';
        $r2->employee_id='B-15';
        $r2->shift='A';
        $r2->time_start='10:00';
        $r2->time_end='10:10';
        $r2->good_product_quantity='20';
        $r2->defective_product_quantity='1';
        $r2->record='FALSE';

        $r3 = new Report;
        $r3->schedule_id='3';
        $r3->product_id='BFVXF155040080';
        $r3->employee_id='C-08';
        $r3->shift='A';
        $r3->time_start='10:10';
        $r3->time_end='12:00';
        $r3->good_product_quantity='100';
        $r3->defective_product_quantity='3';
        $r3->record='FALSE';

        $r4 = new Report;
        $r4->schedule_id='4';
        $r4->product_id='BCCF8311000080';
        $r4->employee_id='A-18';
        $r4->shift='B';
        $r4->time_start='16:00';
        $r4->time_end='18:00';
        $r4->good_product_quantity='80';
        $r4->defective_product_quantity='5';
        $r4->record='FALSE';

        $r = [$r1,$r2,$r3,$r4];
        foreach ($r as $r) {
            $r->save();
        }
    }

}
