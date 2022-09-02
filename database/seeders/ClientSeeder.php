<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c1 = new Client;
        $c1->client_name = 'YMT';
        $c1->client_phone = '03-4833322';

        $c2 = new Client;
        $c2->client_name = 'GOGORO';
        $c2->client_phone = '04-26269878';

        $c3 = new Client;
        $c3->client_name = 'SYM';
        $c3->client_phone = '04-25610803';
        
        $c = [$c1, $c2, $c3];
        foreach ($c as $c) {
            $c->save();
    }
}

}
