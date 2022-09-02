<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s1 = new Schedule;
        $s1->product_id = 'BKEF834V000080';
        $s1->today = '20210728';
        $s1->period_start = '8:00';
        $s1->period_end = '15:00';
        $s1->content = '確保';
        $s1->total_quantity = '1200';

        $s2 = new Schedule;
        $s2->product_id = 'B8RF474A00P080';
        $s2->today = '20210729';
        $s2->period_start = '8:00';
        $s2->period_end = '16:30';
        $s2->content = '量產';
        $s2->total_quantity = '2000';

        $s3 = new Schedule;
        $s3->product_id = 'BFVXF155040080';
        $s3->today = '20210801';
        $s3->period_start = '8:00';
        $s3->period_end = '9:00';
        $s3->content = '換模';
        $s3->total_quantity = '';

        $s4 = new Schedule;
        $s4->product_id = 'BCCF8311000080';
        $s4->today = '20210802';
        $s4->period_start = '8:00';
        $s4->period_end = '12:00';
        $s4->content = '確保';
        $s4->total_quantity = '800';

        $s5 = new Schedule;
        $s5->product_id = 'BBJF6241000080';
        $s5->today = '20210804';
        $s5->period_start = '8:00';
        $s5->period_end = '14:00';
        $s5->content = '量產';
        $s5->total_quantity = '650';

        $s = [$s1, $s2, $s3, $s4, $s5];
        foreach ($s as $s) {
            $s->save();
        //
    }
}

}