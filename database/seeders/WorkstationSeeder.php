<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Workstation;

class WorkstationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $w1= new Workstation;
        $w1->workstation_name = '組立部1';
        $w1->procedure = '組立';

        $w2= new Workstation;
        $w2->workstation_name = '熔接部1';
        $w2->procedure = '熔接';

        $w3= new Workstation;
        $w3->workstation_name = '射出機1-1';
        $w3->procedure = '塑膠射出';

        $w4= new Workstation;
        $w4->workstation_name = '射出機1-2';
        $w4->procedure = '塑膠射出';

        $w5= new Workstation;
        $w5->workstation_name = '射出機1-3';
        $w5->procedure = '塑膠射出';

        $w6= new Workstation;
        $w6->workstation_name = '射出機2-1';
        $w6->procedure = '塑膠射出';

        $w7= new Workstation;
        $w7->workstation_name = '射出機2-2';
        $w7->procedure = '塑膠射出';

        $W = [$w1,$w2,$w3,$w4,$w5,$w6,$w7];
        foreach($W as $w){
            $w->save();
        }

        
    }
}
