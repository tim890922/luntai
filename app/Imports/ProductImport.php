<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow as ConcernsWithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpParser\Node\Stmt\Continue_;

class ProductImport implements ToCollection, ConcernsWithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows )
    {
        // dd($rows);
        foreach ($rows as $row) {
            $data = [];
            if (!empty(str_replace(" ", "", $row['料貨編號'])) && $row['料貨編號'] != null) {
                $data = [
                    'id' => $row['料貨編號'],
                    'name' => $row['料貨名稱'],
                    'material' => $row['材質'],
                    'weight' => $row['重量kg'],
                    'tonnes' => $row['射出成形噸'],
                    'client_id'=>1
                ];
                Product::create($data);
            }
            else
                continue;
        }
    }
}
