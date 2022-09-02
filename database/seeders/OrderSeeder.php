<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $o1=new Order;
        $o1->product_id = 'BKEF834V000080';
        $o1->clientuser_id = '9101';
        $o1->position = '1000';
        $o1->P_F = '';
        $o1->delivery = '2022-11-01';
        $o1->order_number = '';
        $o1->quantity = '40';
        $o1->packages_quantity = '40';

        $o2=new Order;
        $o2->product_id = 'B8RF474A00P080';
        $o2->clientuser_id = '9101';
        $o2->position = '1001';
        $o2->P_F = 'P101';
        $o2->delivery = '2022-11-02';
        $o2->order_number = '';
        $o2->quantity = '40';
        $o2->packages_quantity = '20';

        $o3=new Order;
        $o3->product_id = 'BFVXF155040080';
        $o3->clientuser_id = '9101';
        $o3->position = '2000';
        $o3->P_F = '';
        $o3->delivery = '2022-11-03';
        $o3->order_number = '';
        $o3->quantity = '40';
        $o3->packages_quantity = '40';

        $o4=new Order;
        $o4->product_id = 'BCCF8311000080';
        $o4->clientuser_id = '9101';
        $o4->position = '2000';
        $o4->P_F = '';
        $o4->delivery = '2022-11-04';
        $o4->order_number = '';
        $o4->quantity = '40';
        $o4->packages_quantity = '40';

        $o5=new Order;
        $o5->product_id = 'BKEF834V000080';
        $o5->clientuser_id = '9101';
        $o5->position = '3000';
        $o5->P_F = 'P102';
        $o5->delivery = '2022-11-01';
        $o5->order_number = '';
        $o5->quantity = '80';
        $o5->packages_quantity = '40';
        
        $o6=new Order;
        $o6->product_id = 'BKEF834V000080';
        $o6->clientuser_id = '9101';
        $o6->position = '8000';
        $o6->P_F = '';
        $o6->delivery = '2022-11-02';
        $o6->order_number = '';
        $o6->quantity = '80';
        $o6->packages_quantity = '40';
        
        $o7=new Order;
        $o7->product_id = 'BKEF834V000080';
        $o7->clientuser_id = '9101';
        $o7->position = '8000';
        $o7->P_F = '';
        $o7->delivery = '2022-11-03';
        $o7->order_number = '';
        $o7->quantity = '20';
        $o7->packages_quantity = '40';

        $o8=new Order;
        $o8->product_id = 'B8RF474A00P080';
        $o8->clientuser_id = '9101';
        $o8->position = '8000';
        $o8->P_F = '';
        $o8->delivery = '2022-11-04';
        $o8->order_number = '';
        $o8->quantity = '160';
        $o8->packages_quantity = '20';

        $o9=new Order;
        $o9->product_id = 'BFVXF155040080';
        $o9->clientuser_id = '9101';
        $o9->position = '1000';
        $o9->P_F = '';
        $o9->delivery = '2022-11-01';
        $o9->order_number = '';
        $o9->quantity = '20';
        $o9->packages_quantity = '40';

        $o10=new Order;
        $o10->product_id = 'BFVXF155040080';
        $o10->clientuser_id = '9102';
        $o10->position = '2000';
        $o10->P_F = '';
        $o10->delivery = '2022-11-02';
        $o10->order_number = '';
        $o10->quantity = '160';
        $o10->packages_quantity = '40';

        $o11=new Order;
        $o11->product_id = 'BFVXF155040080';
        $o11->clientuser_id = '9103';
        $o11->position = '2000';
        $o11->P_F = '';
        $o11->delivery = '2022-11-03';
        $o11->order_number = '';
        $o11->quantity = '160';
        $o11->packages_quantity = '40';

        $o12=new Order;
        $o12->product_id = 'BFVXF155040080';
        $o12->clientuser_id = '9102';
        $o12->position = '1001';
        $o12->P_F = 'P103';
        $o12->delivery = '2022-11-04';
        $o12->order_number = '';
        $o12->quantity = '160';
        $o12->packages_quantity = '40';

        $o13=new Order;
        $o13->product_id = 'BCCF8311000080';
        $o13->clientuser_id = '9102';
        $o13->position = '1001';
        $o13->P_F = '';
        $o13->delivery = '2022-11-01';
        $o13->order_number = '';
        $o13->quantity = '20';
        $o13->packages_quantity = '40';

        $o14=new Order;
        $o14->product_id = 'BCCF8311000080';
        $o14->clientuser_id = '9102';
        $o14->position = '1001';
        $o14->P_F = '';
        $o14->delivery = '2022-11-02';
        $o14->order_number = '';
        $o14->quantity = '110';
        $o14->packages_quantity = '40';

        $o15=new Order;
        $o15->product_id = 'BCCF8311000080';
        $o15->clientuser_id = '9102';
        $o15->position = '3005';
        $o15->P_F = '';
        $o15->delivery = '2022-11-03';
        $o15->order_number = '';
        $o15->quantity = '65';
        $o15->packages_quantity = '40';

        $o16=new Order;
        $o16->product_id = 'BCCF8311000080';
        $o16->clientuser_id = '9103';
        $o16->position = '3005';
        $o16->P_F = '';
        $o16->delivery = '2022-11-04';
        $o16->order_number = '';
        $o16->quantity = '70';
        $o16->packages_quantity = '40';

        $o17=new Order;
        $o17->product_id = 'BCCF8311000080';
        $o17->clientuser_id = '9103';
        $o17->position = '4000';
        $o17->P_F = '';
        $o17->delivery = '2022-11-01';
        $o17->order_number = '';
        $o17->quantity = '50';
        $o17->packages_quantity = '40';

        $o18=new Order;
        $o18->product_id = 'B8RF474A00P080';
        $o18->clientuser_id = '9103';
        $o18->position = '8000';
        $o18->P_F = 'P104';
        $o18->delivery = '2022-11-02';
        $o18->order_number = '';
        $o18->quantity = '130';
        $o18->packages_quantity = '20';

        $o19=new Order;
        $o19->product_id = 'B8RF474A00P080';
        $o19->clientuser_id = '9103';
        $o19->position = '1001';
        $o19->P_F = '';
        $o19->delivery = '2022-11-03';
        $o19->order_number = '';
        $o19->quantity = '200';
        $o19->packages_quantity = '20';

        $o20=new Order;
        $o20->product_id = 'B8RF474A00P080';
        $o20->clientuser_id = '9103';
        $o20->position = '1000';
        $o20->P_F = '';
        $o20->delivery = '2022-11-04';
        $o20->order_number = '';
        $o20->quantity = '120';
        $o20->packages_quantity = '20';

        $O = [$o1,$o2,$o3,$o4,$o5,$o6,$o7,$o8,$o9,$o10,$o11,$o12,$o13,$o14,$o15,$o16,$o17,$o18,$o19,$o20];
        foreach($O as $o){
            $o->save();
        }
    }
}
