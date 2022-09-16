<?php

namespace App\Imports;

use App\Models\Order;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow as ConcernsWithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;


class OrderImport implements ToCollection, ConcernsWithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        // dd($rows);
        //$i = 0;
        foreach ($rows as $row) {
            $data = [];
            if (!empty(str_replace(" ", "", $row['料貨號'])) && $row['料貨號'] != null) {
                $date = date('Y-m-d', ($row['交貨日'] - 25569) * 86400);
                $data = [
                    'product_id' => $row['料貨號'],
                    'position' => $row['出貨位'],
                    'clientuser_id' => $row['用方'],
                    'order_number' => $row['訂單號'],
                    // 'delivery'=>Date::excelToDateTimeObject($row['交貨日']),
                    'delivery' => $date,
                    // 'delivery'=>gmdate("Y-m-d", ($row['交貨日']- 25569) * 86400),//$UNIX_DATE = ($EXCEL_DATE - 25569) * 86400;echo gmdate("d-m-Y H:i:s", $UNIX_DATE);
                    'quantity' => $row['數量'],
                    'package' => $row['包裝數'],
                    'P_F' => $row['P/F']
                ];

                
                
                Order::create($data);
            }
           // $i++;
           // if ($i == 12)
             //       dd($row['料貨號'],str_replace(" ", "", $row['料貨號']),empty(str_replace(" ", "", $row['料貨號'])),$data);
        }
    }
}
