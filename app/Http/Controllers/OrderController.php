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
        $col = ['訂單編號', '料號', '出貨位', '用方','用方名稱','P/F', '訂單號', '交貨日', '數量','包裝數','狀態(已出貨、未出貨)','刪除','編輯'];

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
                    'text' => $m->position,
                ],
                [
                    'tag' => '',
                    'text' => $m->clientuser_id,
                ],
                [
                    'tag'=>'',
                    'text'=>$m->clientuser->name,
                    
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
                    'alertname' => $m->id,
                    'action' => 'delete',
                    'id' => $m->id
                ],
                [
                    'tag' => 'href',
                    'type' => 'button',
                    'class' => 'px-1 bg-blue-500 rounded hover:bg-blue-700',
                    'text' => '編輯',
                    'action' => 'edit',
                    'id' => $m->id,
                    'href'=>'order/edit/'.$m->id
                ]
            ];
            $row[] = $temp;
            // dd($row);
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
                    'name' => 'position'
                ],
                [
                    'lable' => '用方',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'clientuser_id'
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
                    'name' => 'P_F'
                ],
                [
                    'lable' => '訂單編號',
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
    /**
     * 儲存新增的資料
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {

        $o = new Order;
        // $content = $req->validate(
        //     [
        //         'client_id' => 'required',
        //         'name' => 'required',
        //         'material' => 'required',
        //         'weight' => 'required',
        //         'tonnes' => 'required',
        //         'id' => 'required',
        //     ]
        // );
        dd($req);
        $o->product_id=$req->product_id;
        $o->position=$req->position;
        $o->clientuser_id=$req->clientuser_id;
        $o->user_name=$req->user_name;
        $o->P_F=$req->P_F;
        $o->order_number=$req->order_number;
        $o->delivery=$req->delivery;
        $o->quantity=$req->quantity;
        $o->package=$req->package;
        $o->create();

        return redirect('admin/order')->with('notice', '新增成功');
    }

    /**
     * Display the specified resource.
     *秀單一特定資料
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 編輯單一資料
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//到編輯畫面
    {
        $order=Order::find($id);
        // dd($order);
        $view = [
            'action' => '/admin/order',
            'method'=>'PUT',
            'body' => [
                [
                    'lable' => '料號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'product_id',
                    'value'=>$order->product_id
                ],
                [
                    'lable' => '出貨位',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'position',
                    'value'=>$order->position
                ],
                [
                    'lable' => '用方',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'clientuser_id',
                    'value'=>$order->clientuser_id
                ],
                [
                    'lable' => 'P/F',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'P_F',
                    'value'=>$order->P_F
                ],
                [
                    'lable' => '訂單編號',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'order_number',
                    'value'=>$order->order_number
                ],
                [
                    'lable' => '交貨日',
                    'tag' => 'input',
                    'type' => 'date',
                    'name' => 'delivery',
                    'value'=>$order->delivery
                ],
                [
                    'lable' => '數量',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'quantity',
                    'value'=>$order->quantity
                ],
                [
                    'lable' => '包裝數',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'package',
                    'value'=>$order->package
                ],
            ]
        ];
        return view('backend.create', $view);
    }

    /**
     * 上傳編輯資料
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)//儲存編輯資料
    {
        $o =Order::find($req->id);
        $o->product_id=$req->product_id;
        $o->position=$req->position;
        $o->clientuser_id=$req->clientuser_id;
        $o->user_name=$req->user_name;
        $o->P_F=$req->P_F;
        $o->order_number=$req->order_number;
        $o->delivery=$req->delivery;
        $o->quantity=$req->quantity;
        $o->package=$req->package;
        $o->save();

        return redirect('admin/order')->with('notice', '編輯成功');
    }

    public function import(Request $req) 
    {
        Excel::import(new OrderImport,$req->file('order_file'));
        
        return back();
    }
    public function destroy($id)
    {
        Order::destroy($id);
    }
}
