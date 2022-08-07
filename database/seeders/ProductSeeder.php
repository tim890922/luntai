<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
        
        DB::table('products')->insert([
            'id'=> Str::random(10),
            'client'=> Str::random(3),
            'product_name'=> Str::random(5),
            'price'=> int::random(5),
            'tonnes'=> int::random(5),
            'weight'=> int::random(5),
            'material'=> Str::random(5),

            
        ]);


    }
}
