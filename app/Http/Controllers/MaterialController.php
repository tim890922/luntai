<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Supplier;

class MaterialController extends Controller
{
    public function index()
    { {
            $material = Material::all();
            $col = ['原物料編號', '名稱', '類型', '單位', '材質', '規格', '供應商', '刪除', '編輯']; //表格的標題

            $row = []; //表格的內容

            foreach ($material as $m) {
                $temp = [
                    [
                        'tag' => '',
                        'text' => $m->id,
                    ],
                    [
                        'tag' => '',
                        'text' => $m->name,
                    ],
                    [
                        'tag' => '',
                        'text' => $m->type,
                    ],
                    [
                        'tag' => '',
                        'text' => $m->unit,
                    ],
                    [
                        'tag' => '',
                        'text' => $m->material,
                    ],
                    [
                        'tag' => '',
                        'text' => $m->specification,
                    ],
                    [
                        'tag' => '',
                        'text' => $m->supplier->name,
                    ],
                    [
                        'tag' => 'button',
                        'type' => 'button',
                        'class' => 'px-1 bg-red-500 rounded hover:bg-red-700',
                        'text' => '刪除',
                        'alertname' => '原物料 '.$m->name,
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
                        'href' => 'material/edit/' . $m->id
                    ],
                ];
                $row[] = $temp;
            }
            // dd($row);



            $view = [
                'col' => $col,
                'header' => '原物料管理',
                'title' => '原物料',
                'row' => $row,
                'action' => 'material/create',
                'method' => 'GET',
                'href' => 'material/create',
                'module' => 'material'
            ];


            //    dd($view);
            return view('backend.admin', $view);
        }
    }

    public function create()
    {
        $lists = [
            [
                'value' => '原料',
                'text' => '原料'
            ],
            [
                'value' => '物料',
                'text' => '物料'
            ]
        ];

        $supplier = [];
        $suppliers = Supplier::all();
        foreach ($suppliers as $sup) {
            $temp = [
                'value' => $sup->id,
                'text' => $sup->name
            ];
            $supplier[] = $temp;
        }

        $view = [
            'action' => '/admin/material',
            'body' => [
                // [
                //     'lable' => '原物料編號',
                //     'tag' => 'input',
                //     'type' => 'number',
                //     'step' => '1',
                //     'name' => 'id'
                // ],
                [
                    'lable' => '名稱',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'name'
                ],
                [
                    'lable' => '類型',
                    'tag' => 'select',
                    'name' => 'type',
                    'lists' => $lists,
                ],
                [
                    'lable' => '安全庫存量',
                    'tag' => 'input',
                    'type' => 'number',
                    'name' => 'safety'
                ],
                [
                    'lable' => '單位',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'unit'
                ],
                [
                    'lable' => '材質',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'material'
                ],
                [
                    'lable' => '規格',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'specification'
                ],
                [
                    'lable' => '供應商',
                    'tag' => 'select',
                    'lists' => $supplier,
                    'name' => 'supplier_id'
                ],
            ]

        ];
        return view('backend.create', $view);
    }

    public function store(Request $req)
    {

        $material = new Material;
        $content = $req->validate(
            [
                'name' => 'required',
                'type' => 'required',
                'safety' => 'required',
                'unit' => 'required',
                'material' => 'required',
                'specification' => 'required',
                'supplier_id' => 'required',
            ]
        );
        $content['inventory']=0;
        $material->create($content);

        return redirect('admin/material')->with('notice', '新增成功');
    }


    /**
     * 編輯單一資料
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //到編輯畫面
    {

        $material = Material::find($id);
        $lists = [];
        if ($material->type == '原料') {
            $lists = [
                [
                    'value' => '原料',
                    'text' => '原料',
                    'selected' => 'selected'
                ],
                [
                    'value' => '物料',
                    'text' => '物料'
                ]
            ];
        } else {
            $lists = [
                [
                    'value' => '原料',
                    'text' => '原料',
                    
                ],
                [
                    'value' => '物料',
                    'text' => '物料',
                    'selected' => 'selected'
                ]
            ];
        }
        


        $supplier = [];
        $suppliers = Supplier::all();
        foreach ($suppliers as $sup) {
            if ($material->supplier->id == $sup->id) {
                $temp = [
                    'value' => $sup->id,
                    'text' => $sup->name,
                    'selected' => 'selected'
                ];
            } else {
                $temp = [
                    'value' => $sup->id,
                    'text' => $sup->name
                ];
            }

            $supplier[] = $temp;
        }

        $view = [
            'action' => '/admin/material',
            'method' => 'PUT',
            'body' => [
                [
                    'lable' => '原物料編號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'id',
                    'value' => $material->id
                ],
                [
                    'lable' => '名稱',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'name',
                    'value' => $material->name
                ],
                [
                    'lable' => '類型',
                    'tag' => 'select',
                    'name' => 'type',
                    'lists' => $lists,
                ],
                [
                    'lable' => '安全庫存量',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'safety',
                    'value' => $material->safety
                ],
                [
                    'lable' => '單位',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'unit',
                    'value' => $material->unit
                ],
                [
                    'lable' => '材質',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'material',
                    'value' => $material->material
                ],
                [
                    'lable' => '規格',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'specification',
                    'value' => $material->specification
                ],

                [
                    'lable' => '供應商名稱',
                    'tag' => 'select',
                    'name' => 'supplier_id',
                    'lists' => $supplier,
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
        $p = Material::find($req->id);
        $p->id = $req->id;
        $p->name = $req->name;
        $p->type = $req->type;
        $p->safety = $req->safety;
        $p->unit = $req->unit;
        $p->material = $req->material;
        $p->specification = $req->specification;
        $p->supplier_id = $req->supplier_id;
        $p->save();

        return redirect('admin/material')->with('notice', '編輯成功');
    }

    /**
     * Remove the specified resource from storage.
     *刪除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Material::destroy($id);
    }
}
