<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $e1 = new Employee; 
        $e1->id = 'A-10';
        $e1->name = '小鄭';
        $e1->position = '作業員';
        $e1->account = '1110110';
        $e1->pass_word = 'A1110110';

        $e2 = new Employee; 
        $e2->id = 'B-15';
        $e2->name = '小陳';
        $e2->position = '作業員';
        $e2->account = '1100215';
        $e2->pass_word = 'B1100215';
        
        $e3 = new Employee; 
        $e3->id = 'C-08';
        $e3->name = '小曾';
        $e3->position = '組立';
        $e3->account = '1110308';
        $e3->pass_word = 'C1110308';

        $e4 = new Employee; 
        $e4->id = 'A-18';
        $e4->name = '小劉';
        $e4->position = '作業員';
        $e4->account = '980831';
        $e4->pass_word = 'A0980831';

        $e = [$e1, $e2,$e3,$e4];
        foreach ($e as $e) {
            $e->save();
        }
    }
}