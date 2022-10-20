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
       $m1->next='B7Y-F8300-00';
       $m1->quantity='114.5';
       $m1->unit='g';

       $m2 = new MaterialProduct;
       $m2->product_id='BKEF834V000080';
       $m2->next='R010301-135000';
       $m2->quantity='1';
       $m2->unit='個';

       $m3 = new MaterialProduct;
       $m3->product_id='BKEF834V000080';
       $m3->next='90183-05827';
       $m3->quantity='113.03';
       $m3->unit='g';

       $m4 = new MaterialProduct;
       $m4->product_id='BKEF834V000080';
       $m4->next='B7Y-F118K-00';
       $m4->quantity='1.470';
       $m4->unit='g';

       $m5 = new MaterialProduct;
       $m5->product_id='B7Y-F8300-00';
       $m5->next='B7Y-F8312-00';
       $m5->quantity='12';
       $m5->unit='g';

       $m6 = new MaterialProduct;
       $m6->product_id='B7Y-F8312-00';
       $m6->next='R010110-002000';
       $m6->quantity='1';
       $m6->unit='個';

       $m7 = new MaterialProduct;
       $m7->product_id='B7Y-F8312-00';
       $m7->next='R010209-017000';
       $m7->quantity='1';
       $m7->unit='個';

       $m8 = new MaterialProduct;
       $m8->product_id='B8RF474A00P080';
       $m8->next='B8R-F474A-00-J';
       $m8->quantity='1';
       $m8->unit='個';

       $m9 = new MaterialProduct;
       $m9->product_id='B8RF474A00P080';
       $m9->next='B8R-F471N-00';
       $m9->quantity='1';
       $m9->unit='個';

       $m10 = new MaterialProduct;
       $m10->product_id='B8RF474A00P080';
       $m10->next='B8R-F471M-00';
       $m10->quantity='1';
       $m10->unit='個';

       $m11 = new MaterialProduct;
       $m11->product_id='B8R-F474A-00-J';
       $m11->next='B8R-F474A-00-V';
       $m11->quantity='1';
       $m11->unit='個';

       $m12 = new MaterialProduct;
       $m12->product_id='B8R-F474A-00-V';
       $m12->next='B8R-F474A-00 ';
       $m12->quantity='1';
       $m12->unit='個';

       $m13 = new MaterialProduct;
       $m13->product_id='B8R-F474A-00';
       $m13->next='R010103-029000';
       $m13->quantity='446.5';
       $m13->unit='g';

       $m14 = new MaterialProduct;
       $m14->product_id='B8R-F474A-00';
       $m14->next='BH6-F4148-00';
       $m14->quantity='1';
       $m14->unit='個';

       $m15 = new MaterialProduct;
       $m15->product_id='BFVXF155040080';
       $m15->next='BFV-B1006-00';
       $m15->quantity='115.6';
       $m15->unit='g';

       $m16 = new MaterialProduct;
       $m16->product_id='BFVXF155040080';
       $m16->next='BGR-F2034-01';
       $m16->quantity='78';
       $m16->unit='g';

       $m17 = new MaterialProduct;
       $m17->product_id='BFVXF155040080';
       $m17->next='98976-03567';
       $m17->quantity='37.6';
       $m17->unit='g';

       $m18 = new MaterialProduct;
       $m18->product_id='BFV-B1006-00';
       $m18->next='BFV-B1045-00';
       $m18->quantity='0.14';
       $m18->unit='g';

       $m19 = new MaterialProduct;
       $m19->product_id='BFV-B1045-00';
       $m19->next='R020220-000930';
       $m19->quantity='9';
       $m19->unit='個';

       $m20 = new MaterialProduct;
       $m20->product_id='BFV-B1045-00';
       $m20->next='R020245-000490';
       $m20->quantity='13';
       $m20->unit='個';

       $m21 = new MaterialProduct;
       $m21->product_id='BCCF8311000080';
       $m21->next='BCC-F83-003';
       $m21->quantity='559.3';
       $m21->unit='g';

       $m22 = new MaterialProduct;
       $m22->product_id='BCCF8311000080';
       $m22->next='BCC-F83-004';
       $m22->quantity='456';
       $m22->unit='g';

       $m23 = new MaterialProduct;
       $m23->product_id='BCCF8311000080';
       $m23->next='BCC-F83-007';
       $m23->quantity='88';
       $m23->unit='g';

       $m24 = new MaterialProduct;
       $m24->product_id='BKEF834V000080';
       $m24->next='BCC-F83-001';
       $m24->quantity='46';
       $m24->unit='g';

       $m25 = new MaterialProduct;
       $m25->product_id='BCC-F83-003';
       $m25->next='R010110-002000';
       $m25->quantity='5';
       $m25->unit='個';

       $m26 = new MaterialProduct;
       $m26->product_id='BCC-F83-004';
       $m26->next='R010110-003000';
       $m26->quantity='6';
       $m26->unit='個';
       
       $m27 = new MaterialProduct;
       $m27->product_id='BCC-F83-007';
       $m27->next='R010110-004000';
       $m27->quantity='2';
       $m27->unit='個';

       $m28 = new MaterialProduct;
       $m28->product_id='B8R-F471N-00';
       $m28->next='R010110-0042500';
       $m28->quantity='2';
       $m28->unit='個';

       $m29 = new MaterialProduct;
       $m29->product_id='R010110-0042500';
       $m29->next='R0sdf312310110-0042500';
       $m29->quantity='2';
       $m29->unit='個';

       $M = [$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8,$m9,$m10,$m11,$m12,$m13,$m14,$m15,$m16,$m17,$m18,$m19,$m20,$m21,$m22,$m23,$m24,$m25,$m26,$m27,$m28,$m29];
       foreach($M as $m){
        $m->save();
       }

    }
}
