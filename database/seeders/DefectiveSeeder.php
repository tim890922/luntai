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
        $d1->reason='缺料';

        $d2 = new Defective;
        $d2->reason='縮水';

        $d3 = new Defective;
        $d3->reason='包風';

        $d4 = new Defective;
        $d4->reason='拉傷';

        $d5 = new Defective;
        $d5->reason='油點';

        $d6 = new Defective;
        $d6->reason='噴痕';

        $d7 = new Defective;
        $d7->reason='刮傷';

        $d8 = new Defective;
        $d8->reason='頂白';

        $d9 = new Defective;
        $d9->reason='黑點';

        $d10 = new Defective;
        $d10->reason='其他';

        $D = [$d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$d9,$d10];
        foreach($D as $d){
            $d->save();
        }

    }
}
