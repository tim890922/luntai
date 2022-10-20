<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MaterialChange;

class MaterialChangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mc1 = new MaterialChange;
        $mc1->material_id = '1';
        $mc1->quantity = '120';
        $mc1->unit = '個';
        $mc1->change_status = '出庫';

        $mc2 = new MaterialChange;
        $mc2->material_id = '2';
        $mc2->quantity = '230';
        $mc2->unit = '個';
        $mc2->change_status = '入庫';

        $mc3 = new MaterialChange;
        $mc3->material_id = '3';
        $mc3->quantity = '480';
        $mc3->unit = 'g';
        $mc3->change_status = '出庫';

        $mc = [$mc1,$mc2,$mc3];
        foreach ($mc as $mc) {
            $mc->save();
        }
    }
}
