<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Machine;


class MachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $m1 = new Machine; 
        $m1->id = '1-1';
        $m1->tonnes = '700';
        // $m1->status = '運作中';
        
        $m2 = new Machine;
        $m2->id = '1-2';
        $m2->tonnes = '800';
        // $m2->status = '停機';
       
        $m3 = new Machine;
        $m3->id = '1-3';
        $m3->tonnes = '900';
        // $m3->status = '維修中';

        $m4 = new Machine;
        $m4->id = '2-1';
        $m4->tonnes = '1300';
        // $m4->status = '休息';

        $m5 = new Machine;
        $m5->id = '2-2';
        $m5->tonnes = '1500';
        // $m5->status = '運作中';

        $m = [$m1, $m2, $m3, $m4, $m5];
        foreach ($m as $m) {
            $m->save();
        }
    }
}
