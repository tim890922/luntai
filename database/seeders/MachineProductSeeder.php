<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        $mp1->product_id = 'A-10';
        $mp1->machine_id= '小鄭';
        $mp1->model_id = '作業員';
        $mp1->account = '1110110';
        $mp1->pass_word = 'A1110110'; $e1 = new Employee; 
        $mp1->id = 'A-10';
        $mp1->name = '小鄭';
        $mp1->position = '作業員';
        $mp1->account = '1110110';
        $mp1->pass_word = 'A1110110';
    }
}
