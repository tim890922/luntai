<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;


class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s1 = new Supplier;
        $s1->name = '社口廠';
        $s1->telephone = '04-25611415';

        $s2 = new Supplier;
        $s2->name = '陽光';
        $s2->telephone = '04-26274027';

        $s3 = new Supplier;
        $s3->name = '福德鴻';
        $s3->telephone = '04-22066315';

        $S = [$s1,$s2,$s3];
        foreach($S as $s){
            $s->save();
        }

    }
}
