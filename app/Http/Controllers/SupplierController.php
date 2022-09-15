<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        {
            $supplier = Supplier::all();
            $col = ['供應商編號', '名稱', '電話','刪除','編輯'];//表格的標題
            
            $row=[];//表格的內容
    
            foreach($supplier as $m)
            {
                $temp=[
                    [
                        'tag'=>'',
                        'text'=>$m->id,
                    ],
                    [
                        'tag'=>'',
                        'text'=>$m->name,
                    ],
                    [
                        'tag'=>'',
                        'text'=>$m->telephone,
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
                        'tag'=>'href',
                        'type'=>'button',
                        'class'=>'px-1 bg-blue-500 rounded hover:bg-blue-700',
                        'text'=>'編輯',
                        'action'=>'edit',
                        'id'=>$m->id,
                        'href' =>'supplier/edit/'.$m->id
                    ],
                ];
                $row[]=$temp;
            }
            // dd($row);
            
            
            
            $view = [
                'col' => $col,
                'header' => '原物料供應商管理',
                'title' => '原物料供應商',
                'row' => $row,
                'action' => 'supplier/create',
                'method' => 'GET',
                'href' => 'supplier/create',
                'module'=>'supplier'
            ];
    
    
            //    dd($view);
            return view('backend.admin', $view);
        }
    }
    
        public function create()
        {
            $view = [
                'action' => '/admin/supplier',
                'body' => [
                    [
                        'lable' => '供應商編號',
                        'tag' => 'input',
                        'type' => 'number',
                        'step' => '1',
                        'name' => 'id'
                    ],
                    [
                        'lable' => '名稱',
                        'tag' => 'input',
                        'type' => 'text',
                        'name' => 'name'
                    ],
                    [
                        'lable' => '電話',
                        'tag' => 'input',
                        'type' => 'text',
                        'name' => 'telephone'
                    ],
                ]
    
            ];
            return view('backend.create', $view);
        }
    
        public function store(Request $req)
        {
    
            $supplier = new Supplier;
            $content = $req->validate(
                [
                    'id' => 'required',
                    'name' => 'required',
                    'telephone' => 'required'
                ]
            );
            $supplier->create($content);
    
            return redirect('admin/supplier')->with('notice', '新增成功');
        }

        public function edit($id)//到編輯畫面
    {
        $supplier=Supplier::find($id);
        $view = [
            'action' => '/admin/supplier',
            'method'=>'PUT',
            'body' => [
                [
                    'lable' => '供應商編號',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'id',
                    'value'=>$supplier->id
                ],
                [
                    'lable' => '名稱',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'name',
                    'value'=>$supplier->name
                ],
                [
                    'lable' => '電話',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'telephone',
                    'value'=>$supplier->telephone
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
    public function update(Request $req)//儲存編輯資料
    {
        $p =Supplier::find($req->id);
        $p->id=$req->id;
        $p->name=$req->name;
        $p->telephone=$req->telephone;
        $p->save();

        return redirect('admin/supplier')->with('notice', '編輯成功');
    }
    
        public function destroy($id)
        {
            Supplier::destroy($id);
        }
    }


