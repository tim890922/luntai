<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Storage;

class StorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s1 = new Storage; 
        $s1->id = 'A201';
        $s1->capacity = '96';
        
        $s2 = new Storage; 
        $s2->id = 'A216';
        $s2->capacity = '96';

        $s3 = new Storage; 
        $s3->id = 'A220';
        $s3->capacity = '96';

        $s = [$s1, $s2, $s3];
        foreach ($s as $s) {
            $s->save();
    }
}
}