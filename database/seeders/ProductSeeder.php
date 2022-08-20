<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;
use App\Models\Product;
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
            'client'=> 'YMT',
            'product_name'=> Str::random(5),
            'price'=> '55',
            'tonnes'=> '55',
            'weight'=> '55',
            'material'=> Str::random(5),

            
        ]);


    }
}
