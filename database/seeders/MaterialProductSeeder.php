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
        $m1->product_id = 'BKEF834V000080';
        $m1->material_id = '4';
        $m1->quantity = '1';
        $m1->unit = '個';

        $m2 = new MaterialProduct;
        $m2->product_id = 'BKEF834V000080';
        $m2->material_id = '2';
        $m2->quantity = '1';
        $m2->unit = '個';

        $m3 = new MaterialProduct;
        $m3->product_id = 'BKEF834V000080';
        $m3->material_id = '3';
        $m3->quantity = '113.03';
        $m3->unit = 'g';

        $m4 = new MaterialProduct;
        $m4->product_id = 'BKEF834V000080';
        $m4->material_id = '1';
        $m4->quantity = '1.470';
        $m4->unit = 'g';

        $m5 = new MaterialProduct;
        $m5->product_id = 'B8RF474A00P080';
        $m5->material_id = '10';
        $m5->quantity = '1';
        $m5->unit = '個';

        $m6 = new MaterialProduct;
        $m6->product_id = 'B8RF474A00P080';
        $m6->material_id = '11';
        $m6->quantity = '1';
        $m6->unit = '個';

        $m7 = new MaterialProduct;
        $m7->product_id = 'B8RF474A00P080';
        $m7->material_id = '12';
        $m7->quantity = '1';
        $m7->unit = '個';

        $m8 = new MaterialProduct;
        $m8->product_id = '10';
        $m8->material_id = '13';
        $m8->quantity = '1';
        $m8->unit = '個';

        $m9 = new MaterialProduct;
        $m9->product_id = '13';
        $m9->material_id = '14';
        $m9->quantity = '1';
        $m9->unit = '個';

        $m10 = new MaterialProduct;
        $m10->product_id = '14';
        $m10->material_id = '3';
        $m10->quantity = '446.5';
        $m10->unit = 'g';

        $m11 = new MaterialProduct;
        $m11->product_id = 'BFVXF155040080';
        $m11->material_id = '7';
        $m11->quantity = '115.6';
        $m11->unit = 'g';

        $m12 = new MaterialProduct;
        $m12->product_id = 'BFVXF155040080';
        $m12->material_id = '9';
        $m12->quantity = '78';
        $m12->unit = '個';

        $m13 = new MaterialProduct;
        $m13->product_id = 'BFVXF155040080';
        $m13->material_id = '6';
        $m13->quantity = '37';
        $m13->unit = '個';

        $m14 = new MaterialProduct;
        $m14->product_id = 'BCCF8311000080';
        $m14->material_id = '8';
        $m14->quantity = '559.3';
        $m14->unit = 'g';

        $m15 = new MaterialProduct;
        $m15->product_id = 'BCCF8311000080';
        $m15->material_id = '5';
        $m15->quantity = '456';
        $m15->unit = 'g';

        $m16 = new MaterialProduct;
        $m16->product_id = 'BCCF8311000080';
        $m16->material_id = '2';
        $m16->quantity = '88';
        $m16->unit = 'g';

        $m17 = new MaterialProduct;
        $m17->product_id = 'BCCF8311000080';
        $m17->material_id = '6';
        $m17->quantity = '46';
        $m17->unit = '個';

        $M = [$m1, $m2, $m3, $m4, $m5, $m6, $m7, $m8, $m9, $m10, $m11, $m12, $m13, $m14, $m15, $m16, $m17];
        foreach ($M as $m) {
            $m->save();
        }
    }
}
