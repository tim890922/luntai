<?php

namespace App\Imports;

use App\Models\Order;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow as ConcernsWithHeadingRow;


class OrderImport implements ToCollection, ConcernsWithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        
        foreach($rows as $row){
            $data=[
                'product_id'=>$row['料貨號'],
                'shipping'=>$row['出貨位'],
                'user'=>$row['用方'],
                'user_name'=>$row['用方名稱'],
                'order_number'=>$row['訂單號'],
                'delivery'=>gmdate("Y-m-d", ($row['交貨日']- 25569) * 86400),//$UNIX_DATE = ($EXCEL_DATE - 25569) * 86400;echo gmdate("d-m-Y H:i:s", $UNIX_DATE);
                'quantity'=>$row['數量'],
                'package'=>$row['包裝數'],
                'P_F'=>$row['P/F']
            ];
            Order::create($data);
        }
    }
}
