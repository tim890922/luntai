<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Imports\OrderImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ClientUser;
use App\Models\Client;
use App\Models\ProductStorage;

class OrderController extends Controller
{
    public function index($client_id, Request $req/*, $filter = 'all'*/)
    {
        $id = $client_id;
        $filter = $req->filter;

        $col = ['訂單編號', '料號', '出貨位', '用方', '用方名稱', '交貨日', '數量', '包裝數', '庫存數量', '狀態', '刪除', '編輯'];

        $row = [];
        $class = 'p-3 mx-3 bg-blue-300 border rounded-full cursor-pointer hover:bg-blue-500';
        $subtitle = [
            'button' => [
                [
                    'text' => '已逾期訂單',
                    'href' => '/admin/order/' . $id . '?filter=overdue',
                    'value' => '',
                    'class' => $class
                ],
                [
                    'text' => '今日訂單',
                    'href' => '/admin/order/' . $id . '?filter=today',
                    'value' => '',
                    'class' => $class
                ],
                [
                    'text' => '一周內訂單',
                    'href' => '/admin/order/' . $id . '?filter=week',
                    'value' => '',
                    'class' => $class
                ],
                [
                    'text' => '一個月內訂單',
                    'href' => '/admin/order/' . $id . '?filter=month',
                    'value' => '',
                    'class' => $class
                ],
                [
                    'text' => '已出貨',
                    'href' => '/admin/order/' . $id . '?filter=shipped',
                    'value' => '',
                    'class' => $class
                ],
                [
                    'text' => '未出貨',
                    'href' =>  '/admin/order/' . $id . '?filter=notshipped',
                    'value' => '',
                    'class' => $class
                ]
            ]
        ];
        $orders = [];
        if ($filter == 'all') {
            $orders = Order::all();
        }
        switch ($filter) {
            case 'all':
                $orders = Order::all();
                break;
            case 'overdue':
                $orders = Order::where('delivery', '<', date('Y/m/d'))->get();
                break;
            case 'week':
                $orders = Order::whereBetween('delivery', [date('Y/m/d'), date('Y/m/d', strtotime('+7 day'))])->get();
                break;
            case 'shipped':
                $orders = Order::where('record', 1)->get();
                break;
            case 'notshipped':
                $orders = Order::where('record', 0)->get();
                break;
            case 'month':
                $orders = Order::whereBetween('delivery',  [date('Y/m/d'), date('Y/m/d', strtotime('+1 month'))])->get();
                break;
            case 'today':
                $orders = Order::where('delivery',  [date('Y/m/d')])->get();
                break;
            default:
                $orders = Order::all();
                break;
        }

        foreach ($orders as $m) {
            $productStorages = ProductStorage::where('product_id', $m->product_id)->get();
            $storage = 0;
            foreach ($productStorages as $ps) {
                if ($ps->change_status == '入庫' || $ps->change_status == '解圈存') {
                    $storage += $ps->quantity;
                } else {
                    $storage -= $ps->quantity;
                }
            }
            if ($m->clientuser->client_id == $id) {
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
                        'tag' => '',
                        'text' => $m->clientuser->name,

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
                        'tag' => '',
                        'text' => $storage,
                    ],
                    [
                        'tag' => 'button',
                        'type' => 'button',
                        'action' => 'output',
                        'class' => 'px-1 bg-green-300 rounded hover:bg-green-500',
                        'text' => ($m->record == 1) ? '已出貨' : '未出貨',
                        'id' => $m->id,
                    ],
                    [
                        'tag' => 'button',
                        'type' => 'button',
                        'class' => 'px-1 bg-red-500 rounded hover:bg-red-700',
                        'text' => '刪除',
                        'alertname' => '訂單編號 '.$m->id,
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
                        'href' => '/order/edit/' . $m->id
                    ]
                ];
                $row[] = $temp;
                // dd($row);
            }
        }
        $import = [
            'action' => 'orderImport', 'text' => '匯入訂單', 'file' => 'order_file'
        ];


        $view = [
            'col' => $col, 'header' => '訂單管理', 'title' => '訂單', 'row' => $row, 'action' => 'order/create', 'method' => 'GET', 'href' => '/order/create/' . $id,
            'module' => 'order', 'import' => $import, 'subtitle' => $subtitle
        ];


        //    dd($view);
        return view('backend.admin', $view);
    }

    public function create($id)
    {
        $clientUserList = [];
        $users = ClientUser::where('client_id', $id)->get();
        foreach ($users as $user) {
            $temp =
                [
                    'text' => $user->name,
                    'value' => $user->id
                ];
            $clientUserList[] = $temp;
        }
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
                    'lable' => '用方名稱',
                    'tag' => 'select',
                    'name' => 'clientuser_id',
                    'lists' => $clientUserList,
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
        $clientUser = ClientUser::find($req->clientuser_id);
        // dd($clientUser);
        $o = new Order;
        // dd($req);
        $content = $req->validate(
            [
                'product_id' => 'required',
                'position' => 'required',
                'clientuser_id' => 'required',
                'delivery' => 'required',
                'quantity' => 'required',
                'package' => 'required',
            ]
        );
        // dd($content);
        // dd($req);
        // $o->product_id=$req->product_id;
        // $o->position=$req->position;
        // $o->clientuser_id=$req->clientuser_id;
        // $o->P_F=$req->P_F;
        // $o->order_number=$req->order_number;
        // $o->delivery=$req->delivery;
        // $o->quantity=$req->quantity;
        // $o->package=$req->package;
        $o->create($content);

        return redirect('admin/order/' . $clientUser->client_id)->with('notice', '新增成功');
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
    public function edit($id) //到編輯畫面
    {
        $order = Order::find($id);
        // dd($order);
        $view = [
            'action' => '/admin/order',
            'method' => 'PUT',
            'body' => [
                [
                    'tag' => 'input',
                    'type' => 'hidden',
                    'name' => 'id',
                    'value' => $order->id
                ],
                [
                    'lable' => '料號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'product_id',
                    'value' => $order->product_id
                ],
                [
                    'lable' => '出貨位',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'position',
                    'value' => $order->position
                ],
                [
                    'lable' => '用方',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'clientuser_id',
                    'value' => $order->clientuser_id
                ],
                [
                    'lable' => '交貨日',
                    'tag' => 'input',
                    'type' => 'date',
                    'name' => 'delivery',
                    'value' => $order->delivery
                ],
                [
                    'lable' => '數量',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'quantity',
                    'value' => $order->quantity
                ],
                [
                    'lable' => '包裝數',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'package',
                    'value' => $order->package
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
    public function update(Request $req) //儲存編輯資料
    {
        // dd($req);
        $o = Order::find($req->id);
        $o->product_id = $req->product_id;
        $o->position = $req->position;
        $o->clientuser_id = $req->clientuser_id;
        $o->delivery = $req->delivery;
        $o->quantity = $req->quantity;
        $o->package = $req->package;
        $o->save();

        $href = '/admin/order/' . $o->clientuser->client->id;

        return redirect($href)->with('notice', '編輯成功');
    }

    public function import(Request $req)
    {
        Excel::import(new OrderImport, $req->file('order_file'));

        return back()->with('notice', '匯入成功');
    }

    public function destroy($id)
    {
        Order::destroy($id);
    }

    public function user($id)
    {
        // $client='YMT';
        // $C=Client::where('client_name','YMT')->get();
        // $USER=$C->clientusers->name;
        // dd($USER);
        $order = Order::all();
        $user = [];
        // $user[] = 'YMT全部用方';
        // foreach ($C as $c) {
        //     $users = $c->clientusers;
        //     foreach ($users as $u) {
        //         $user[] = $u->name;
        //     }
        //     // dd($C,$c->clientusers);
        // }

        $view =
            [
                'users' => $user,
                // 'href'=>$href
            ];


        return view('backend.user', $view);
    }

    public function test()
    {
    }

    public function select()
    {
        $clients = Client::all();

        $body = [];
        foreach ($clients as $client) {
            $temp = [
                'client' => $client->client_name,
                'href' => $client->id
            ];
            $body[] = $temp;
        }
        // dd($body);
        $view = [
            'body' => $body
        ];
        return view('backend.order', $view);
    }

    public function output($id)
    {
        $order = Order::find($id);
        $text = '';
        if ($order->record == 0) {
            $order->record = 1;
            $text = '已出貨';
        } else
            $order->record = 0;

        $order->save();
        return $text;
    }

    public function filter($id, $filter)
    {
        $orders = Order::where();
    }

    public function load($id)
    {
        $ps = new ProductStorage;
        $order = Order::find($id);

        if ($order->isLoad == 0) {
            $storage = ProductStorage::where('product_id', $order->product_id)->get();
            $quantity = 0;
            foreach ($storage as $s) {
                if ($s->change_status == '入庫' || $s->change_status == '解圈存') {
                    $quantity += $s->quantity;
                } else
                    $quantity -= $s->quantity;
            }
            // dd($quantity);
            if ($quantity >= $order->quantity) {
                $order->isLoad = 1;
                $ps->product_id = $order->product_id;
                $ps->quantity = $order->quantity;
                $ps->change_status = '圈存';
                $ps->responsible = session()->get('user')->name;
                $ps->save();
                $order->save();
                return "圈存成功";
            } else {
                return "庫存不夠" . (($order->quantity) - $quantity);
            }
        } else {
            $order->isLoad = 0;
            $ps->product_id = $order->product_id;
            $ps->quantity = $order->quantity;
            $ps->change_status = '解圈存';
            $ps->responsible = session()->get('user')->id;
            $ps->save();
            $order->save();
            return "解圈存成功";
        }
        //dd($ps);

    }
}
