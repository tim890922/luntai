<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        $e1->nationality = 'A';
        $e1->name = '小鄭';
        $e1->position = '主管';
        $e1->account = '1110110';
        $e1->pass_word = Hash::make('A1110110');

        $e2 = new Employee;
        $e2->nationality = 'B';
        $e2->name = '小陳';
        $e2->position = '作業員';
        $e2->account = '1100215';
        $e2->pass_word = Hash::make('B1100215');

        $e3 = new Employee;
        $e3->nationality = 'A';
        $e3->name = '小曾';
        $e3->position = '組立';
        $e3->account = '1110308';
        $e3->pass_word = Hash::make('C1110308');

        $e4 = new Employee;
        $e4->nationality = 'A';
        $e4->name = '小劉';
        $e4->position = '作業員';
        $e4->account = '980831';
        $e4->pass_word = Hash::make('A0980831');

        $e5 = new Employee;
        $e5->nationality = 'A';
        $e5->name = 'Tim';
        $e5->position = '主管';
        $e5->account = '123';
        $e5->pass_word = Hash::make('123');

        $e = [$e1, $e2, $e3, $e4, $e5];
        foreach ($e as $e) {
            $e->save();
        }
    }
}
