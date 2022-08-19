<?php

namespace App\Imports;

use App\Models\Order;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Mattwebsite\Excel\Concerns\WithHeadingRow;

class OrderImport implements ToCollection,WithHeadingRow
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
                'delivery'=>$row['交貨日'],
                'quantity'=>$row['數量'],
                'package'=>$row['包裝數']
            ];
            Order::create($data);
        }
    }
}
