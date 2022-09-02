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
        $w2->workstation_name = '熔接部2';
        $w2->procedure = '熔接';

        $w3= new Workstation;
        $w3->workstation_name = '塑膠射出部1';
        $w3->procedure = '塑膠射出成形';

        $W = [$w1,$w2,$w3];
        foreach($W as $w){
            $w->save();
        }

        
    }
}
