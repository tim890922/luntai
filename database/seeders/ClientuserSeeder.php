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
        $c1->name='YMT';
        $c1->address='新竹縣';

        $c2 = new Clientuser;
        $c2->id='9102';
        $c2->client_id='1';
        $c2->name='YMT';
        $c2->address='新竹市';

        $c3 = new Clientuser;
        $c3->id='9103';
        $c3->client_id='1';
        $c3->name='YMT';
        $c3->address='苗栗縣';

        $C = [$c1,$c2,$c3];
        foreach($C as $c){
            $c->save();
        }



    }
}
