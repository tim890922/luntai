<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Imports\OrderImport;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        $col = ['訂單編號', '料號', '出貨位', '用方', '用方名稱', 'P/F', '訂單號', '交貨日', '數量','包裝數','狀態(已出貨、未出貨)'];

        $row = [];

        foreach ($orders as $m) {
            $temp = [
                [
                    'tag' => '',
                    'text' => $m->id,
                ],
                [
                    'tag' => '',
                    'text' => $m->product_id,
                ],
                [
                    'tag' => '',
                    'text' => $m->shipping,
                ],
                [
                    'tag' => '',
                    'text' => $m->user,
                ],
                [
                    'tag' => '',
                    'text' => $m->user_name,
                ],
                [
                    'tag' => '',
                    'text' => $m->P_F,
                ],
                [
                    'tag' => '',
                    'text' => $m->order_number,
                ],
                [
                    'tag' => '',
                    'text' => $m->delivery,
                ],
                [
                    'tag' => '',
                    'text' => $m->quantity,
                ],
                [
                    'tag' => '',
                    'text' => $m->package,
                ],
                [
                    'tag'=>'button',
                    'type'=>'button',
                    'class'=>($m->status==1)?'px-1 bg-green-300 rounded hover:bg-green-500':'px-1 bg-red-300 rounded hover:bg-red-500' ,
                    'text'=>($m->status==1)?'已出貨':'未出貨',
                    'action'=>'',
                    'id'=>$m->id
                ],
                [
                    'tag' => 'button',
                    'type' => 'button',
                    'class' => 'px-1 bg-red-500 rounded hover:bg-red-700',
                    'text' => '刪除',
                    'action' => 'delete',
                    'id' => $m->id
                ],
                [
                    'tag' => 'button',
                    'type' => 'button',
                    'class' => 'px-1 bg-blue-500 rounded hover:bg-blue-700',
                    'text' => '編輯',
                    'action' => 'edit',
                    'id' => $m->id
                ]
            ];
            $row[] = $temp;
        }
        $import=['action'=>'orderImport','text'=>'匯入訂單'
        ];


        $view = [
            'col' => $col, 'header' => '訂單', 'title' => '料號', 'row' => $row, 'action' => 'order/create', 'method' => 'GET', 'href' => 'order/create',
            'module' => 'order','import'=>$import
        ];


        //    dd($view);
        return view('backend.admin', $view);
    }

    public function create()
    {
        $view = [
            'action' => '/admin/order',
            'body' => [
                [
                    'lable' => '料號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'product_id'
                ],
                [
                    'lable' => '出貨位',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'shipping'
                ],
                [
                    'lable' => '用方',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'user'
                ],
                [
                    'lable' => '用方名稱',
                    'tag' => 'input',
                    'type' => 'text',
                    'step' => '',
                    'name' => 'user_name'
                ],
                [
                    'lable' => 'P/F',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'P/F'
                ],
                [
                    'lable' => '訂單號',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'order_number'
                ],
                [
                    'lable' => '交貨日',
                    'tag' => 'input',
                    'type' => 'date',
                    'name' => 'delivery'
                ],
                [
                    'lable' => '數量',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'quantity'
                ],
                [
                    'lable' => '包裝數',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'package'
                ]
                
            ]

        ];
        return view('backend.create', $view);
    }

    public function import(Request $req) 
    {
        Excel::import(new OrderImport,$req->file('order_file'));
        
        return back();
    }
}
