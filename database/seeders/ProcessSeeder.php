<?php
// todo 先跳過

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Process;

class ProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = new Process; 
        $p1->product_id = 'B8RF474A00P080';
        $p1->procedure = '塑膠射出';
        $p1->queue = 1;

        $p2 = new Process; 
        $p2->product_id = 'B8RF474A00P080';
        $p2->procedure = '組立';
        $p2->queue = 2;

        $p3 = new Process; 
        $p3->product_id = 'BCCF8311000080';
        $p3->procedure = '塑膠射出';
        $p3->queue = 1;

        $p4 = new Process; 
        $p4->product_id = 'BCCF8311000080';
        $p4->procedure = '熔接';
        $p4->queue = 2;

        $p5 = new Process; 
        $p5->product_id = 'BFVXF155040080';
        $p5->procedure = '塑膠射出';
        $p5->queue = 1;

        $p6 = new Process; 
        $p6->product_id = 'BFVXF155040080';
        $p6->procedure = '組立';
        $p6->queue = 2;

        $p = [$p1, $p2, $p3,$p4,$p5,$p6];
        foreach ($p as $p) {
            $p->save();
    }
}

}