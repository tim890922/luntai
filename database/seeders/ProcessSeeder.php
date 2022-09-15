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
        $p1->id = '1';
        $p1->product_id = 'BKEF834V000080';
        $p1->machine_id = '1-1';
        $p1->ct = 89;
        $p1->queue=1;

        $p2 = new Process; 
        $p2->id = '2';
        $p2->product_id = 'BKEF834V000080';
        $p2->workstation_id = '2';
        $p2->ct = 65;
        $p2->queue=2;

        $p3 = new Process; 
        $p3->id = '3';
        $p3->product_id = 'B8RF474A00P080';
        $p3->machine_id = '1-3';
        $p3->ct = 86;
        $p3->queue=1;

        $p4 = new Process; 
        $p4->id = '4';
        $p4->product_id = 'B8RF474A00P080';
        $p4->workstation_id = '1';
        $p4->ct = 56;
        $p4->queue=2;

        $p5 = new Process; 
        $p5->id = '5';
        $p5->product_id = 'BFVXF155040080';
        $p5->machine_id = '1-3';
        $p5->ct = 87;
        $p5->queue=1;

        $p6 = new Process; 
        $p6->id = '6';
        $p6->product_id = 'BFVXF155040080';
        $p6->workstation_id = '1';
        $p6->ct = 34;
        $p6->queue=2;

        $p = [$p1, $p2, $p3,$p4,$p5,$p6];
        foreach ($p as $p) {
            $p->save();
    }
}

}