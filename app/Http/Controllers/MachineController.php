<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;
use PHPUnit\Runner\Hook;

class MachineController extends Controller
{
    public function index()
    {
        $machine = Machine::all();
        $col = ['機台別', '噸數', '刪除', '編輯', '狀態'];

        $row = [];

        foreach ($machine as $m) {
            $temp = [
                [
                    'tag' => '',
                    'text' => $m->id,
                ],
                [
                    'tag' => '',
                    'text' => $m->tonnes,
                ],
                [
                    'tag' => 'button',
                    'type' => 'button',
                    'class' => 'px-1 bg-red-500 rounded hover:bg-red-700',
                    'text' => '刪除',
                    'action' => 'delete',
                    'alertname' => $m->id,
                    'id' => $m->id
                ],
                [
                    'tag' => 'href',
                    'type' => 'button',
                    'class' => 'px-1 bg-blue-500 rounded hover:bg-blue-700',
                    'text' => '編輯',
                    'action' => 'edit',
                    'id' => $m->id,
                    'href' => 'machine/edit/' . $m->id
                ],
                [
                    'tag' => 'button',
                    'type' => 'button',
                    'class' => ($m->status == 1) ? 'px-1 bg-green-300 rounded hover:bg-green-500' : 'px-1 bg-red-300 rounded hover:bg-red-500',
                    'text' => ($m->status == 1) ? '運作中' : '停機',
                    'action' => '',
                    'id' => $m->id,
                ]
            ];
            $row[] = $temp;
        }
        // dd($row);



        $view = [
            'col' => $col,
            'header' => '機台管理',
            'title' => '機台',
            'row' => $row,
            'action' => 'machine/create',
            'method' => 'GET',
            'href' => 'machine/create',
            'module' => 'machine'
        ];


        //    dd($view);
        return view('backend.admin', $view);
    }

    public function create()
    {
        $view = [
            'action' => '/admin/machine',
            'body' =>
            [
                [
                    'lable' => '機台別',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'id',
                    // 'required' => 'required'
                ],
                [
                    'lable' => '噸數/T',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '0.01',
                    'name' => 'tonnes',
                    // 'required' => 'required'
                ],
            ]

        ];
        return view('backend.create', $view);
    }

    public function store(Request $req)
    {

        $machine = new Machine;
        $content = $req->validate(
            [
                'id' => 'required',
                'tonnes' => 'required'
            ]
        );
        $machine->create($content);

        return redirect('admin/machine')->with('notice', '新增成功');
    }

    public function edit($id) //到編輯畫面
    {
        $machine = Machine::find($id);
        $view = [
            'action' => '/admin/machine',
            'method' => 'PUT',
            'body' => [
                [
                    'lable' => '機台別',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'id',
                    'value' => $machine->id
                ],
                [
                    'lable' => '噸數/T',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '0.01',
                    'name' => 'tonnes',
                    'value' => $machine->tonnes
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
        $p = Machine::find($req->id);
        $p->id = $req->id;
        $p->tonnes = $req->tonnes;
        $p->save();

        return redirect('admin/machine')->with('notice', '編輯成功');
    }

    public function destroy($id)
    {
        Machine::destroy($id);
    }
}
