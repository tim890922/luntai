<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use App\Models\MaterialChange;

class MaterialChangeController extends Controller
{
    /**
     *列出資料
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materialchanges = MaterialChange::all();
        $col = ['原物料名稱', '數量', '單位', '異動狀態', '時間', '刪除', '編輯'];

        $row = [];

        foreach ($materialchanges as $m) {
            $temp = [
                [
                    'tag' => '',
                    'text' => $m->material->name,
                ],
                [
                    'tag' => '',
                    'text' => $m->quantity,
                ],

                [
                    'tag' => '',
                    'text' => $m->unit,
                ],
                [
                    'tag' => '',
                    'text' => $m->change_status,
                ],
                [
                    'tag' => '',
                    'text' => $m->created_at,
                ],
                [
                    'tag' => 'button',
                    'type' => 'button',
                    'class' => 'px-1 bg-red-500 rounded hover:bg-red-700',
                    'text' => '刪除',
                    'alertname' => $m->material->name,
                    'action' => 'delete',
                    'id' => $m->id
                ],
                [
                    'tag' => 'href',
                    'type' => '',
                    'class' => 'px-1 bg-blue-500 rounded hover:bg-blue-700',
                    'text' => '編輯',
                    'alertname' => $m->id,
                    'action' => 'edit',
                    'id' => $m->id,
                    'href' => 'materialChange/edit/' . $m->id
                ]
            ];
            $row[] = $temp;
        }

        // dd($list);
        $view = [
            'col' => $col, 'header' => '原物料異動狀態清單', 'row' => $row, 'method' => 'GET',
            'module' => 'materialChange'
        ];


        //    dd($view);
        return view('backend.admin', $view);
    }

    /**
     * Show the form for creating a new resource.
     *轉到新增畫面
     * @return \Illuminate\Http\Response
     */
    public function create($i)
    {
        $materialchanges = MaterialChange::all();
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
            'header' => ($i == 0) ? '原物料出庫' : '原物料入庫',
            'action' => '/admin/materialChange',
            'redirect' => ($i == 0) ? '/admin/materialChange/1' : '/admin/materialChange/0',
            'body' => [
                [
                    'lable' => '原物料編號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'material_id'
                ],
                [
                    'lable' => '數量',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'quantity'
                ],
                [
                    'lable' => '單位',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'unit'
                ],
                [
                    'lable' => '',
                    'tag' => 'input',
                    'name' => 'change_status',
                    'type' => 'hidden',
                    'value' => $status[$i]['value']
                ]
            ]

        ];
        // dd($view['redirect'][-1]);
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

        $m = new MaterialChange;
        $content = $req->validate(
            [
                'material_id' => 'required',
                'quantity' => 'required',
                'unit' => 'required',
                'change_status' => 'required'
            ]
        );

        $m->create($content);
        $notice = ($req->change_status == '出庫') ? '出庫成功' : '入庫成功';
        return back()->with('notice', $notice);
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
        $status = [];
        $materialchange = MaterialChange::find($id);
        if ($materialchange->change_status == '出庫') {
            $status = [
                [
                    'value' => '出庫',
                    'text' => '出庫',
                    'selected' => 'selected'
                ],
                [
                    'value' => '入庫',
                    'text' => '入庫'
                ],

            ];
        } else {
            $status = [
                [
                    'value' => '出庫',
                    'text' => '出庫',

                ],
                [
                    'value' => '入庫',
                    'text' => '入庫',
                    'selected' => 'selected'
                ],

            ];
        }




        $view = [
            'action' => '/admin/materialChange',
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
                    'lable' => '原物料名稱',
                    'tag' => '',
                    'type' => 'text',
                    'name' => 'material_id',
                    'value' => $materialchange->material_id,
                    'text' => $materialchange->material->name,
                ],
                [
                    'lable' => '數量',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'quantity',
                    'value' => $materialchange->quantity
                ],
                [
                    'lable' => '單位',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'unit',
                    'value' => $materialchange->unit
                ],
                [
                    'lable' => '異動狀態',
                    'tag' => 'select',
                    'type' => '',
                    'name' => 'change_status',
                    'lists' => $status
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
        $m = MaterialChange::find($req->id);
        // $m->material_id = $req->material_id;
        $m->quantity = $req->quantity;
        $m->unit = $req->unit;
        $m->change_status = $req->change_status;
        $m->save();


        return redirect('admin/materialChange')->with('notice', '編輯成功');
    }

    /**
     * Remove the specified resource from storage.
     *刪除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MaterialChange::destroy($id);
    }
}
