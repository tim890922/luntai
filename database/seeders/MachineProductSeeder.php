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
        $mp1->machine_id= '1-1';
        $mp1->model_id = 'A1110112';
        $mp1->cycle_time = '98';
        $mp1->morning_employee = '1';
        $mp1->night_employee = '1';
        $mp1->cavity = '1';
        $mp1->non_performing_rate = '0.50';
        $mp1->priority = '1';

        $mp2 = new MachineProduct; 
        $mp2->product_id = 'B8RF474A00P080';
        $mp2->machine_id= '1-1';
        $mp2->model_id = 'A1110204';
        $mp2->cycle_time = '87';
        $mp2->morning_employee = '1';
        $mp2->night_employee = '1';
        $mp2->cavity = '1';
        $mp2->non_performing_rate = '0.30';
        $mp2->priority = '2';
       
        $mp3= new MachineProduct; 
        $mp3->product_id = 'BFVXF155040080';
        $mp3->machine_id= '2-1';
        $mp3->model_id = 'A1110310';
        $mp3->cycle_time = '84';
        $mp3->morning_employee = '1';
        $mp3->night_employee = '1';
        $mp3->cavity = '1';
        $mp3->non_performing_rate = '0.40';
        $mp3->priority = '1';

        $mp4= new MachineProduct; 
        $mp4->product_id = 'BCCF8311000080';
        $mp4->machine_id= '2-1';
        $mp4->model_id = 'A1110422';
        $mp4->cycle_time = '102';
        $mp4->morning_employee = '1';
        $mp4->night_employee = '1';
        $mp4->cavity = '1';
        $mp4->non_performing_rate = '0.50';
        $mp4->priority = '2';

        $mp = [$mp1, $mp2,$mp3,$mp4];
        foreach ($mp as $mp) {
            $mp->save();
        }
    }
}
