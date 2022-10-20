<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MachineProduct;

class MachineProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mp1 = new MachineProduct; 
        $mp1->product_id = 'BKEF834V000080';
        $mp1->workstation_id= '3';
        $mp1->priority = '1';
        $mp1->cycle_time = '98';
        $mp1->morning_employee = '1';
        $mp1->night_employee = '1';
        $mp1->cavity = '1';
        $mp1->non_performing_rate = '0.03';

        $mp2 = new MachineProduct; 
        $mp2->product_id = 'BKEF834V000080';
        $mp2->workstation_id= '4';
        $mp2->priority = '2';
        $mp2->cycle_time = '110';
        $mp2->morning_employee = '1';
        $mp2->night_employee = '1';
        $mp2->cavity = '1';
        $mp2->non_performing_rate = '0.05';

        $mp3 = new MachineProduct; 
        $mp3->product_id = 'BKEF834V000080';
        $mp3->workstation_id= '2';
        $mp3->priority = '1';
        $mp3->cycle_time = '50';
        $mp3->morning_employee = '1';
        $mp3->night_employee = '1';
        $mp3->non_performing_rate = '0.05';

        $mp4 = new MachineProduct; 
        $mp4->product_id = 'B8RF474A00P080';
        $mp4->workstation_id= '5';
        $mp4->priority = '1';
        $mp4->cycle_time = '87';
        $mp4->morning_employee = '1';
        $mp4->night_employee = '1';
        $mp4->cavity = '1';
        $mp4->non_performing_rate = '0.02';

        $mp5 = new MachineProduct; 
        $mp5->product_id = 'B8RF474A00P080';
        $mp5->workstation_id= '6';
        $mp5->priority = '2';
        $mp5->cycle_time = '97';
        $mp5->morning_employee = '1';
        $mp5->night_employee = '1';
        $mp5->cavity = '1';
        $mp5->non_performing_rate = '0.04';
        
        $mp6 = new MachineProduct; 
        $mp6->product_id = 'B8RF474A00P080';
        $mp6->workstation_id= '1';
        $mp6->priority = '1';
        $mp6->cycle_time = '47';
        $mp6->morning_employee = '1';
        $mp6->night_employee = '1';
        $mp6->non_performing_rate = '0.08';

        $mp7 = new MachineProduct; 
        $mp7->product_id = 'BFVXF155040080';
        $mp7->workstation_id= '3';
        $mp7->priority = '1';
        $mp7->cycle_time = '102';
        $mp7->morning_employee = '1';
        $mp7->night_employee = '1';
        $mp7->cavity = '1';
        $mp7->non_performing_rate = '0.03';

        $mp8 = new MachineProduct; 
        $mp8->product_id = 'BFVXF155040080';
        $mp8->workstation_id= '7';
        $mp8->priority = '2';
        $mp8->cycle_time = '130';
        $mp8->morning_employee = '1';
        $mp8->night_employee = '1';
        $mp8->cavity = '1';
        $mp8->non_performing_rate = '0.06';

        $mp9 = new MachineProduct; 
        $mp9->product_id = 'BFVXF155040080';
        $mp9->workstation_id= '1';
        $mp9->priority = '1';
        $mp9->cycle_time = '56';
        $mp9->morning_employee = '1';
        $mp9->night_employee = '1';
        $mp9->non_performing_rate = '0.05';

        

        $mp = [$mp1,$mp2,$mp3,$mp4,$mp5,$mp6,$mp7,$mp8,$mp9];
        foreach ($mp as $mp) {
            $mp->save();
        }
    }
}
