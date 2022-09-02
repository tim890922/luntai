<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $m1 = new Material; 
        $m1->id = '1';
        $m1->supplier_id = '1';
        $m1->name = '黑色母';
        $m1->type = '原料';
        $m1->inventory = '150';
        $m1->safety = '100';
        $m1->unit = '個';
        $m1->material = '0033';
        $m1->Specification = 'F-3045';

        $m2 = new Material; 
        $m2->id = '2';
        $m2->supplier_id = '2';
        $m2->name = '塑膠袋';
        $m2->type = '物料';
        $m2->inventory = '150';
        $m2->safety = '100';
        $m2->unit = '個';
        $m2->material = 'PE';
        $m2->Specification = '80cm*100cm*0.05mm';

        $m3 = new Material; 
        $m3->id = '3';
        $m3->supplier_id = '3';
        $m3->name = '塑膠粒';
        $m3->type = '原料';
        $m3->inventory = '150';
        $m3->safety = '100';
        $m3->unit = 'g';
        $m3->material = 'PP-N4';
        $m3->Specification = '7533';
        
        $m = [$m1, $m2, $m3];
        foreach ($m as $m) {
            $m->save();
    }
}

}