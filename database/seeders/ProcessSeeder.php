<?php

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
        $p1->workstation_id = '1';

        $p2 = new Process; 
        $p2->id = '2';
        $p2->product_id = 'B8RF474A00P080';
        $p2->machine_id = '1-2';
        $p2->workstation_id = '2';

        $p3 = new Process; 
        $p3->id = '3';
        $p3->product_id = 'BFVXF155040080';
        $p3->machine_id = '1-3';
        $p3->workstation_id = '3';

        $p = [$p1, $p2, $p3];
        foreach ($p as $p) {
            $p->save();
    }
}

}