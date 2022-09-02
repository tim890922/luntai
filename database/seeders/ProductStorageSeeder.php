<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductStorage;

class ProductStorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ps1 = new ProductStorage;
        $ps1->product_id = 'BKEF834V000080';
        $ps1->storage_id = 'A201-1';
        $ps1->quantity = '240';
        $ps1->basket_number = '5';
        $ps1->change_status = '入庫';
        $ps1->time = '8:00';
        $ps1->responsible = '小鄭';

        $ps2 = new ProductStorage;
        $ps2->product_id = 'B8RF474A00P080';
        $ps2->storage_id = 'A201-2';
        $ps2->quantity = '288';
        $ps2->basket_number = '6';
        $ps2->change_status = '入庫';
        $ps2->time = '9:00';
        $ps2->responsible = '小陳';

        $ps3 = new ProductStorage;
        $ps3->product_id = 'BFVXF155040080';
        $ps3->storage_id = 'A201-3';
        $ps3->quantity = '336';
        $ps3->basket_number = '7';
        $ps3->change_status = '出庫';
        $ps3->time = '19:00';
        $ps3->responsible = '小曾';

        $ps = [$ps1, $ps2, $ps3];
        foreach ($ps as $ps) {
            $ps->save();
        }
    }
}
