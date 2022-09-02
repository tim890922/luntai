<?php

namespace Database\Seeders;

use App\Models\Defective;
use Illuminate\Database\Seeder;

class DefectiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $d1 = new Defective;
        $d1->reason='黑點';

        $d2 = new Defective;
        $d2->reason='缺料';

        $d3 = new Defective;
        $d3->reason='噴痕';

        $d4 = new Defective;
        $d4->reason='刮傷';

        $D = [$d1,$d2,$d3,$d4];
        foreach($D as $d){
            $d->save();
        }

    }
}
