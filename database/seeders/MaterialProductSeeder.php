<?php

namespace Database\Seeders;

use App\Models\MaterialProduct;
use Illuminate\Database\Seeder;

class MaterialProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $m1 = new MaterialProduct;
       $m1->product_id='BKEF834V000080';
       $m1->material_id='1';
       $m1->quantity='120';
       $m1->unit='個';

       $m2 = new MaterialProduct;
       $m2->product_id='B8RF474A00P080';
       $m2->material_id='2';
       $m2->quantity='200';
       $m2->unit='個';

       $m3 = new MaterialProduct;
       $m3->product_id='BFVXF155040080';
       $m3->material_id='3';
       $m3->quantity='80';
       $m3->unit='個';

       $M = [$m1,$m2,$m3];
       foreach($M as $m){
        $m->save();
       }

    }
}
