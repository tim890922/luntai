<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Product;
use Ramsey\Uuid\Type\Integer;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = new Product;
        $p1->id='BKEF834V000080';
        $p1->name='PROTECTOR';
        $p1->material='PC-A1';
        $p1->weight='0.151';
        $p1->tonnes='600';
        $p1->client_id='1';
        
        $p2 = new Product;
        $p2->id='B8RF474A00P080';
        $p2->name='ASSIST,GRIP';
        $p2->material='PA-R1';
        $p2->weight='0.426';
        $p2->tonnes='650';
        $p2->client_id='1';
        
        $p3 = new Product;
        $p3->id='BFVXF155040080';
        $p3->name='FENDER.INNER ASSY';
        $p3->material='PP-N4';
        $p3->weight='0.827';
        $p3->tonnes='1250';
        $p3->client_id='1';

        $p4 = new Product;
        $p4->id='BCCF8311000080';
        $p4->name='SHIELD,LEG 1';
        $p4->material='ABS-A1';
        $p4->weight='1.025';
        $p4->tonnes='1250';
        $p4->client_id='1';

        $P=[$p1,$p2,$p3,$p4];

        foreach($P as $p){
            $p->save();
        }
    }
}
