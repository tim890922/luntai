<?php

namespace Database\Seeders;

use App\Models\Clientuser;
use Illuminate\Database\Seeder;

class ClientuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c1 = new Clientuser;
        $c1->id='9101';
        $c1->client_id='1';
        $c1->name='組立課B/D職場';
        $c1->address='新竹縣';

        $c2 = new Clientuser;
        $c2->id='9102';
        $c2->client_id='1';
        $c2->name='組立課E/G職場';
        $c2->address='新竹縣';

        $c3 = new Clientuser;
        $c3->id='9103';
        $c3->client_id='1';
        $c3->name='完成車組立課JET PUMP組立';   
        $c3->address='新竹縣';

        $C = [$c1,$c2,$c3];
        foreach($C as $c){
            $c->save();
        }



    }
}
