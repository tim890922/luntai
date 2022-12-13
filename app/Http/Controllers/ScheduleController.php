<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ProductStorage;
use App\Models\MachineProduct;
use App\Models\Process;
use App\Models\Schedule;
use App\Models\MaterialProduct;

class ScheduleController extends Controller
{
    public function index()
    {


        $orders = Order::where([['schedule_status', '未排程'], ['record', 0], ['isLoad', 0]])->orderBy('delivery', 'desc')->get();
        // $orders=$orders->links()->orderBy('delevery','desc')->get();
        $col = ['訂單編號', '料號', '交貨日', '預估生產時間(h)', '訂單剩餘天數', '訂購數量', '庫存數', '排程狀態', ''];
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
                        'text' => (strtotime(date('Y-m-d')) <= strtotime($order->delivery)) ? -1 * (round((strtotime("now") - strtotime($order->delivery)) / (60 * 60 * 24), 0)) : '已逾期' . round((strtotime("now") - strtotime($order->delivery)) / (60 * 60 * 24), 0) . '天',
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
                        'class' => '',
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

    public function create($id)
    {
        $body = [];
        $schedule = Schedule::find($id); //訂單陣列
        $orderCTs = []; //每筆訂單的單產品生產時間
        $material = MaterialProduct::where('product_id', $schedule->product_id)->get();
        $material = MaterialProductController::materialList($material); //原物料
        $content = [
            [
                'text' => '量產',
                'value' => '量產'
            ]
        ];
        $materials = [];
        //material數量計算
        // foreach ($material as $material) {
        //     $material['quantity'] *= $schedule->total_quantity;

        //     if (isset($material['next'])) {
        //         foreach ($material['next'] as $next) {
        //             $next['quantity'] *= $schedule->total_quantity;
        //         }
        //     }
        //     $materials[] = $material;
        // }
        // dd($materials);
        // for($i=0;$i<count($material);$i++){
        //     $material[$i]['quantity']*=$schedule->total_quantity;
        //     if(isset($material[$i]['next'])){
        //         for($j=0;$j<count($material[$i]['next']);$j++){
        //             $material[$i]['next'][$j]['quantity']*=$schedule->total_quantity;
        //         }
        //     }
        // }

        // dd($schedule);


        $status = [];

        $status_temp = (!$schedule->isAssign == '0') ? '已發放' : '發放製令';
        $status[] = $status_temp;
        $machines = MachineProduct::where('product_id', $schedule->product_id)->get();
        $machineList = [];
        $machineTime = [];



        foreach ($machines as $m) {
            if ($m->workstation->procedure == '塑膠射出') {
                $temp = [
                    'text' => $m->workstation->workstation_name,
                    'value' => $m->workstation_id
                ];

                $temp_1[$schedule->product_id][$m->workstation_id] = $m->cycle_time;
                $machineList[] = $temp;
                $machineTime = $temp_1;
            }
        }

        $temp = [
            [
                'lable' => '生產批號',
                'readonly' => '',
                'tag' => '',
                'type' => 'text',
                'name' => 'schedule_id',
                'value' => $schedule->id,
                'text' => $schedule->id,
            ],
            [
                'lable' => '訂單號',
                'tag' => '',
                'type' => 'text',
                'name' => 'order_id',
                'value' => $schedule->order->id,
                'text' => $schedule->order->id,
                'readonly' => ''
            ],
            [
                'lable' => '料號',
                'tag' => '',
                'type' => 'text',
                'name' => 'product_id',
                'value' => $schedule->product_id,
                'text' => $schedule->product_id,
            ],
            [
                'lable' => '訂單數量',
                'tag' => '',
                'type' => 'text',
                'name' => 'schedule_id',
                'value' => $schedule->order->quantity,
                'text' => $schedule->order->quantity,
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
                'step' => 1,
                'type' => 'number',
                'name' => 'total_quantity',
                'value' => $schedule->total_quantity,
            ],
            [
                'lable' => '機台',
                'tag' => 'select',
                'data_attr' => $schedule->product_id,
                'type' => 'date',
                'name' => 'workstation_id',
                'lists' => $machineList,
            ],
            [
                'lable' => '',
                'readonly' => '',
                'tag' => 'input',
                'type' => 'hidden',
                'name' => 'schedule_id',
                'value' => $schedule->id,
            ],
            [
                'lable' => '',
                'tag' => 'input',
                'type' => 'hidden',
                'name' => 'order_id',
                'value' => $schedule->order->id,
                'text' => $schedule->order->id,
                'readonly' => ''
            ],
            [
                'lable' => '',
                'tag' => 'input',
                'type' => 'hidden',
                'name' => 'product_id',
                'value' => $schedule->product_id,
                'text' => $schedule->product_id,
            ],
        ];
        $body[] = $temp;

        // dd($body[0][0]['value']);
        // dd($material);

        $view = [
            'body' => $body,
            'status' => $status,
            'machineTime' => $machineTime,
            'header' => $schedule->product_id,
            'content' => $material

        ];

        return view('backend.schedule.create', $view);
    }

    public function store(Request $req)
    {
        // dd($req);
        $s = Schedule::find($req->schedule_id);

        $s->product_id = $req->product_id;
        $s->today = $req->today;
        $s->period_start = $req->period_start;
        $s->period_end = $req->period_end;
        $s->content = $req->content;
        $s->total_quantity = $req->total_quantity;
        $s->workstation_id = $req->workstation_id;
        $s->order_id = $req->order_id;
        $s->isAssign = 1;
        $s->save();

        // $order = Order::find($req->order_id);
        // $order->schedule_status = '已排程';
        // $order->save();
        return '排程成功';
    }

    public function mainSchedule(Request $req)
    {

        $orders_init = []; //原始訂單
        $orders = []; //整理後訂單
        foreach ($req->order as $id) {
            $order = Order::find($id);
            $orders_init[] = $order;
            $order->schedule_status = '已排程';
            $order->save();
        }
        foreach ($orders_init as $order) {
            $schedule = new Schedule;
            $schedule->product_id = $order->product_id;
            $schedule->order_id = $order->id;
            $schedule->today = date("Y-m-d");
            $schedule->content = '量產';
            $schedule->total_quantity = $order->quantity;
            $schedule->save();
        }
        // dd($orders);

        $schedules = Schedule::where('isFinish', 0)->get();
        foreach ($schedules as $order) {
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
                $time = $cycle_time * $order->total_quantity;
                $temp = [
                    'id' => $order->id, 'time' => round($time / 3600, 2), 'delivery' => $order->order->delivery, 'product_id' => $order->product_id, 'quantity' => $order->total_quantity
                ];
                $orders[] = $temp;
            }
        }
        return redirect('/admin/schedule/list');
    }

    public function list()
    {
        $schedules = Schedule::where('isFinish', 0)->get();
        $orders = [];
        foreach ($schedules as $order) {
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
                $time = $cycle_time * $order->total_quantity;
                $temp = [
                    'order_id' => $order->order->id, 'time' => round($time / 3600, 2), 'delivery' => $order->order->delivery, 'product_id' => $order->product_id, 'quantity' => $order->total_quantity, 'id' => $order->id, 'isAssign' => $order->isAssign
                ];
                $orders[] = $temp;
            }
        }

        // dd($orders);
        $t = [];
        $delivery = [];
        if (isset($orders)) {

            foreach ($orders as $key => $row) {
                $delivery[$key] = $row['delivery'];
                $t[$key] = $row['time'];
            }

            array_multisort($delivery, SORT_ASC, $t, SORT_DESC, $orders);
        }

        // dd($orders,$t);


        $col = ['順序', '訂單號', '料號', '數量', '預計工時', '交期', '料號單', '發放製令'];
        $row = [];
        foreach ($orders as $key => $o) {
            $temp = [
                [
                    'tag' => '',
                    'text' => $key + 1
                ],
                [
                    'tag' => '',
                    'text' => $o['order_id'],
                ],
                [
                    'tag' => '',
                    'text' => $o['product_id'],
                ],
                [
                    'tag' => '',
                    'text' => $o['quantity'],
                ],
                [
                    'tag' => '',
                    'text' => $o['time'] . '小時',
                ],
                [
                    'tag' => '',
                    'text' => $o['delivery'],
                ],
                [
                    'tag' => 'href',
                    'type' => '',
                    'class' => 'bg-red-300',
                    'action' => '',
                    'id' => '',
                    'text' => '生成料號單',
                    'href' => 'generateProductLabel/' . $o['product_id'],
                    'target' => '_blank'
                ],
                [
                    'tag' => 'href',
                    'type' => '',
                    'class' => ($o['isAssign'] == 0) ? 'px-1 bg-yellow-300 rounded hover:bg-yellow-500' : '',
                    'text' => ($o['isAssign'] == 0) ? '發放' : '已發放',
                    'alertname' => $o['id'],
                    'action' => 'push',
                    'id' => $o['id'],
                    'href' => 'release/' . $o['id']
                ]
            ];
            $row[] = $temp;
        }



        $view = [
            'row' => $row, 'col' => $col, 'header' => '排程清單', 'module' => 'schedule'
        ];
        return view('backend.admin', $view);
    }

    public function release($id)
    {
        $schedule = Schedule::find($id);
    }
}
