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
        
        $m4 = new Material; 
        $m4->id = '4';
        $m4->supplier_id = '1';
        $m4->name = '泡殼';
        $m4->type = '物料';
        $m4->inventory = '200';
        $m4->safety = '150';
        $m4->unit = '個';
        $m4->material = 'PP-N4';
        $m4->Specification = '1SH-F6246-00 泡殼100入';

        $m5 = new Material; 
        $m5->id = '5';
        $m5->supplier_id = '1';
        $m5->name = '塑膠粒';
        $m5->type = '原料';
        $m5->inventory = '120';
        $m5->safety = '100';
        $m5->unit = 'g';
        $m5->material = 'PVC';
        $m5->Specification = '2688';

        $m6 = new Material; 
        $m6->id = '6';
        $m6->supplier_id = '2';
        $m6->name = '保護膜';
        $m6->type = '物料';
        $m6->inventory = '60';
        $m6->safety = '60';
        $m6->unit = '個';
        $m6->material = 'PE';
        $m6->Specification = '25cm*200cm';

        $m7 = new Material; 
        $m7->id = '7';
        $m7->supplier_id = '3';
        $m7->name = '塑膠粒';
        $m7->type = '原料';
        $m7->inventory = '200';
        $m7->safety = '180';
        $m7->unit = 'g';
        $m7->material = 'ABS';
        $m7->Specification = '6743';

        $m8 = new Material; 
        $m8->id = '8';
        $m8->supplier_id = '1';
        $m8->name = '塑膠粒';
        $m8->type = '原料';
        $m8->inventory = '250';
        $m8->safety = '220';
        $m8->unit = 'g';
        $m8->material = 'PP';
        $m8->Specification = '9453';

        $m9 = new Material; 
        $m9->id = '9';
        $m9->supplier_id = '3';
        $m9->name = '墊片';
        $m9->type = '物料';
        $m9->inventory = '300';
        $m9->safety = '200';
        $m9->unit = '個';
        $m9->material = 'PP';
        $m9->Specification = '2cm*2cm';

        $m10 = new Material; 
        $m10->id = '10';
        $m10->supplier_id = '3';
        $m10->name = '塗裝';
        $m10->type = '物料';
        $m10->inventory = '200';
        $m10->safety = '150';
        $m10->unit = '個';
        $m10->material = '良和';
        $m10->Specification = '0582';

        $m11 = new Material; 
        $m11->id = '11';
        $m11->supplier_id = '2';
        $m11->name = '色母1';
        $m11->type = '物料';
        $m11->inventory = '130';
        $m11->safety = '75';
        $m11->unit = '個';
        $m11->material = 'AISI 12L14';
        $m11->Specification = '3128';

        $m12 = new Material; 
        $m12->id = '12';
        $m12->supplier_id = '2';
        $m12->name = '色母2';
        $m12->type = '物料';
        $m12->inventory = '130';
        $m12->safety = '75';
        $m12->unit = '個';
        $m12->material = 'AISI 12L15';
        $m12->Specification = '3129';

        $m13 = new Material; 
        $m13->id = '13';
        $m13->supplier_id = '3';
        $m13->name = '研磨';
        $m13->type = '物料';
        $m13->inventory = '140';
        $m13->safety = '80';
        $m13->unit = '個';
        $m13->material = 'PA-R1';
        $m13->Specification = '本色';

        $m14 = new Material; 
        $m14->id = '14';
        $m14->supplier_id = '3';
        $m14->name = '輔助器';
        $m14->type = '物料';
        $m14->inventory = '200';
        $m14->safety = '140';
        $m14->unit = '個';
        $m14->material = 'PA-R1';
        $m14->Specification = '本色';

        $m = [$m1, $m2, $m3, $m4, $m5, $m6, $m7, $m8, $m9, $m10, $m11, $m12, $m13, $m14];
        foreach ($m as $m) {
            $m->save();
    }
}

}