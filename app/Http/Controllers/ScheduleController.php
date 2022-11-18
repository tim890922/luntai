<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ProductStorage;
use App\Models\MachineProduct;
use App\Models\Process;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {


        $orders = Order::where([['schedule_status', '未排程'], ['record', 0], ['isLoad', 0]])->orderBy('delivery')->get();
        // $orders=$orders->links()->orderBy('delevery','desc')->get();
        $col = ['訂單編號', '料號', '交貨日', '預估生產時間(h)', '訂單剩餘天數', '數量', '庫存數', '排程狀態', ''];
        $row = [];
        $count = 1;
        foreach ($orders as $order) {
            $productStorages = ProductStorage::where('product_id', $order->product_id)->get();
            $storage = 0;


            foreach ($productStorages as $ps) {
                if ($ps->change_status == '入庫' || $ps->change_status == '解圈存') {
                    $storage += $ps->quantity;
                } else {
                    $storage -= $ps->quantity;
                }
            }
            if ($order->record == 0 && $order->isLoad == 0) {
                $processes = MachineProduct::where('product_id', $order->product_id)->get();
                $time = 0;
                $minInjection = 999;
                $cycle_time = 0;

                foreach ($processes as $p) {
                    $minInjection = 999;


                    if ($p->workstation->procedure == '塑膠射出') {
                        if ($minInjection >= $p->cycle_time)
                            $minInjection = $p->cycle_time;
                    } else {
                        $cycle_time += $p->cycle_time;
                    }
                }
                $cycle_time += $minInjection;
                $time = $cycle_time * $order->quantity;
                $temp = [
                    [
                        'tag' => '',
                        'text' => $order->id
                    ],
                    [
                        'tag' => '',
                        'text' => $order->product_id
                    ],
                    [
                        'tag' => '',
                        'text' => $order->delivery
                    ],
                    [
                        'tag' => '',
                        'text' => round(($time / 60 / 60), 2)
                    ],
                    [
                        'tag' => '',
                        'text' => (strtotime(date('Y-m-d')) <= strtotime($order->delivery)) ? round((strtotime("now") - strtotime($order->delivery)) / (60 * 60 * 24), 0) : '已逾期' . round((strtotime("now") - strtotime($order->delivery)) / (60 * 60 * 24), 0) . '天',
                        'class' => (strtotime(date('Y-m-d')) <= strtotime($order->delivery)) ? '' : 'bg-red-300'
                    ],
                    [
                        'tag' => '',
                        'text' => $order->quantity
                    ],
                    [
                        'tag' => '',
                        'text' => $storage
                    ],
                    // [
                    //     'tag' => 'button',
                    //     'type' => 'button',
                    //     'action' => 'load',
                    //     'text' => ($order->isLoad == 0) ? '未圈存' : '圈存',
                    //     'class' => 'px-1 bg-blue-300 rounded hover:bg-blue-500',
                    //     'id' => $order->id
                    // ],
                    [
                        'tag' => 'button',
                        'type' => 'button',
                        'action' => 'schedule',
                        'text' => $order->schedule_status,
                        'class' => 'px-1 bg-green-300 rounded hover:bg-green-500',
                        'id' => $order->id
                    ],
                    [
                        'tag' => 'checkbox',
                        'type' => 'checkbox',
                        'action' => 'schedule',
                        'text' => $order->schedule_status,
                        'class' => 'px-1 bg-green-300 rounded hover:bg-green-500',
                        'id' => $order->id,
                        'name' =>   'order[]',
                        'value' => $order->id
                    ],

                ];
                $row[] = $temp;
            }
        }







        $view = [
            'row' => $row,
            'col' => $col,
            'action' => 'schedule/create'
        ];
        return view('backend.schedule.index', $view);
    }

    public function create(Request $req)
    {
        $body = [];
        $orders = []; //訂單陣列
        $orderCTs = []; //每筆訂單的單產品生產時間
        $content = [
            [
                'text' => '量產',
                'value' => '量產'
            ]
        ];




        foreach ($req->order as $id) {
            $orders[] = Order::find($id);
        }
        $status = [];
        foreach ($orders as $order) {
            $status_temp = ($order->schedule_status == '已排程') ? '已發放' : '發放製令';
            $status[] = $status_temp;
            $machines = MachineProduct::where('product_id', $order->product_id)->get();
            $machineList = [];
            $machineTime = [];



            foreach ($machines as $m) {
                if ($m->workstation->procedure == '塑膠射出') {
                    $temp = [
                        'text' => $m->workstation->workstation_name,
                        'value' => $m->workstation_id
                    ];

                    $temp_1[$order->product_id][$m->workstation_id] = $m->cycle_time;
                    $machineList[] = $temp;
                    $machineTime = $temp_1;
                }
            }

            $temp = [

                [
                    'lable' => '訂單號',
                    'readonly' => '',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'order_id',
                    'value' => $order->id,
                    'readonly' => ''
                ],
                [
                    'lable' => '料號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'product_id',
                    'value' => $order->product_id,
                    'readonly' => ''
                ],
                [
                    'lable' => '日期',
                    'tag' => 'input',
                    'type' => 'date',
                    'name' => 'today',
                    'value' => date('Y-m-d', strtotime('+1 day')),
                ],
                [
                    'lable' => '開始時間',
                    'tag' => 'input',
                    'type' => 'time',
                    'name' => 'period_start',
                    'value' => '',
                ],
                [
                    'lable' => '結束時間',
                    'tag' => 'input',
                    'type' => 'time',
                    'name' => 'period_end',
                    'value' => '',
                ],
                [
                    'lable' => '內容',
                    'tag' => 'select',
                    'type' => 'text',
                    'name' => 'content',
                    'lists' => $content,
                ],
                [
                    'lable' => '總預計產量',
                    'tag' => 'input',
                    'step'=>1,
                    'type' => 'number',
                    'name' => 'total_quantity',
                    'value' => '',
                ],
                [
                    'lable' => '機台',
                    'tag' => 'select',
                    'data_attr' => $order->product_id,
                    'type' => 'date',
                    'name' => 'workstation_id',
                    'lists' => $machineList,
                ]
            ];
            $body[] = $temp;
        }
        // dd($body[0][0]['value']);


        $view = [
            'body' => $body,
            'status' => $status,
            'machineTime' => $machineTime,

        ];
        // dd($view);
        // dd($view);
        // dd($machineTime);
        return view('backend.schedule.create', $view);
    }

    public function store(Request $req)
    {
        $s = new Schedule;
        $s->product_id = $req->product_id;
        $s->today = $req->today;
        $s->period_start = $req->period_start;
        $s->period_end = $req->period_end;
        $s->content = $req->content;
        $s->total_quantity = $req->total_quantity;
        $s->workstation_id = $req->workstation_id;
        $s->save();

        $order = Order::find($req->order_id);
        $order->schedule_status = '已排程';
        $order->save();
        return '排程成功';
    }
}
