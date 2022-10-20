<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductStorage;

class ProductStorageController extends Controller
{
    /**
     *列出資料
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productstorages = ProductStorage::all();
        $col = ['料號', '儲位編號', '數量', '籃子數', '異動狀態', '時間', '負責人','刪除','編輯'];

        $row = [];

        foreach ($productstorages as $p) {
            $temp = [
                [
                    'tag' => '',
                    'text' => $p->product_id,
                ],
                [
                    'tag' => '',
                    'text' => $p->storage_id,
                ],

                [
                    'tag' => '',
                    'text' => $p->quantity,
                ],
                [
                    'tag' => '',
                    'text' => $p->basket_number,
                ],
                [
                    'tag' => '',
                    'text' => $p->change_status,
                ],
                [
                    'tag' => '',
                    'text' => $p->created_at,
                ],
                [
                    'tag' => '',
                    'text' => $p->responsible,
                ],
                [
                    'tag' => 'button',
                    'type' => 'button',
                    'class' => 'px-1 bg-red-500 rounded hover:bg-red-700',
                    'text' => '刪除',
                    'alertname' => $p->id,
                    'action' => 'delete',
                    'id' => $p->id
                ],
                [
                    'tag' => 'href',
                    'type' => '',
                    'class' => 'px-1 bg-blue-500 rounded hover:bg-blue-700',
                    'text' => '編輯',
                    'alertname' => $p->id,
                    'action' => 'edit',
                    'id' => $p->id,
                    'href' => 'productStorage/edit/' . $p->id
                ]
            ];
            $row[] = $temp;
        }

        // dd($list);
        $view = [
            'col' => $col, 'header' => '成品倉儲管理', 'title' => '成品異動狀態 ', 'row' => $row, 'action' => 'productStorage/create', 'method' => 'GET', 'href' => 'productStorage/create',
            'module' => 'productStorage'
        ];


        //    dd($view);
        return view('backend.admin', $view);
    }

    /**
     * Show the form for creating a new resource.
     *轉到新增畫面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productstorages=ProductStorage::all();
        $status = [
            [
                'value' => '出庫',
                'text' => '出庫'
            ],
            [
                'value' => '入庫',
                'text' => '入庫'
            ],

        ];
        $view = [
            'action' => '/admin/productStorage',
            'body' => [
                [
                    'lable' => '料號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'product_id'
                ],
                [
                    'lable' => '儲位編號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'storage_id'
                ],
                [
                    'lable' => '數量',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'quantity'
                ],
                [
                    'lable' => '籃子數',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'basket_number'
                ],
                [
                    'lable' => '異動狀態',
                    'tag' => 'select',
                    'name'=>'change_status',
                    'type' => '',
                    'lists' => $status
                ],
                [
                    'lable' => '負責人',
                    'tag' => 'input',
                    'type' => 'text',
                    'name'=>'responsible',
                    
                    
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

        $p = new Productstorage;
        $content = $req->validate(
            [
                'product_id' => 'required',
                'storage_id' => 'required', 
                'quantity' => 'required',
                'basket_number' => 'required',
                'change_status' => 'required',
                'responsible' => 'required'
            ]
        );

        $p->create($content);

        return redirect('admin/productStorage')->with('notice', '新增成功');
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
        $productstorage = Productstorage::find($id);
        $status = [
            [
                'value' => '出庫',
                'text' => '出庫'
            ],
            [
                'value' => '入庫',
                'text' => '入庫'
            ],

        ];



        $view = [
            'action' => '/admin/productStorage',
            'method' => 'PUT',
            'body' => [
                [
                    'lable' => '',
                    'tag' => 'input',
                    'type' => 'hidden',
                    'name' => 'id',
                    'value' => $id
                ],
                [
                    'lable' => '料號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'product_id',
                    'value' => $productstorage->product_id
                ],
                [
                    'lable' => '儲位編號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'storage_id',
                    'value' => $productstorage->storage_id
                ],
                [
                    'lable' => '數量',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'quantity',
                    'value' => $productstorage->quantity
                ],
                [
                    'lable' => '籃子數',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'basket_number',
                    'value' => $productstorage->basket_number
                ],
                [
                    'lable' => '異動狀態',
                    'tag' => 'select',
                    'type' => '',
                    'name' => 'change_status',
                    'lists' => $status
                ],
                [
                    'lable' => '負責人',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'responsible',
                    'value' => $productstorage->responsible
                ]
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
        $p = Productstorage::find($req->id);
        $p->product_id = $req->product_id;
        $p->storage_id = $req->storage_id;
        $p->quantity = $req->quantity;
        $p->basket_number = $req->basket_number;
        $p->change_status = $req->change_status;
        $p->responsible = $req->responsible;
        $p->save();


        return redirect('admin/productStorage')->with('notice', '編輯成功');
    }

    /**
     * Remove the specified resource from storage.
     *刪除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Productstorage::destroy($id);
    }
}
