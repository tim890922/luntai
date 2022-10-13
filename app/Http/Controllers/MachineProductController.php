<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MachineProduct;
use App\Models\Machine;

class MachineProductController extends Controller
{
    public function index()
    {
        $machineproduct = MachineProduct::all();
        $col = ['料號', '機台編號', '模具編號', 'C/Ts', '日班人數', '夜班人數', '穴數', '不良率', '優先順序', '刪除', '編輯'];

        $row = [];

        foreach ($machineproduct as $m) {
            $temp = [
                [
                    'tag' => '',
                    'text' => $m->product_id,
                ],
                [
                    'tag' => '',
                    'text' => $m->machine_id,
                ],
                [
                    'tag' => '',
                    'text' => $m->model_id,
                ],
                [
                    'tag' => '',
                    'text' => $m->cycle_time,
                ],
                [
                    'tag' => '',
                    'text' => $m->morning_employee,
                ],
                [
                    'tag' => '',
                    'text' => $m->night_employee,
                ],
                [
                    'tag' => '',
                    'text' => $m->cavity,
                ],
                [
                    'tag' => '',
                    'text' => (($m->non_performing_rate) * 100) . '%',
                ],
                [
                    'tag' => '',
                    'text' => $m->priority,
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
                    'type' => '',
                    'class' => 'px-1 bg-blue-500 rounded hover:bg-blue-700 py-1',
                    'text' => '編輯',
                    'alertname' => $m->id,
                    'action' => 'edit',
                    'id' => $m->id,
                    'href' => 'machineProduct/edit/' . $m->id
                ]
            ];
            $row[] = $temp;
        }



        $view = [
            'col' => $col,
            'header' => '排機管理',
            'title' => '排機',
            'row' => $row,
            'action' => 'machineProduct/create', 'method' => 'GET',
            'href' => 'machineProduct/create',
            'module' => 'machineProduct'
        ];
        return view('backend.admin', $view);
    }

    public function create()
    {
        $machines = Machine::all();
        $text = [];
        $value = [];
        foreach ($machines as $machine) {
            $text[] = $machine->tonnes;
            $value[] = $machine->id;
        }
        // dd($text,$value);
        $view = [
            'action' => '/admin/machineProduct',
            'body' => [
                [
                    'lable' => '料號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'product_id'
                ],
                [
                    'lable' => '機台編號',
                    'tag' => 'select',
                    'option' => [
                        'value' => $value,
                        'text' => $text
                    ],
                    'name' => 'machine_id'
                ],
                [
                    'lable' => '模具編號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'model_id'
                ],
                [
                    'lable' => 'C/Ts',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'cycle_time'
                ],
                [
                    'lable' => '日班人數',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'morning_employee'
                ],
                [
                    'lable' => '夜班人數',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'night_employee'
                ],
                [
                    'lable' => '穴數',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'cavity'
                ],
                [
                    'lable' => '不良率',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '0.01',
                    'name' => 'non_performing_rate'
                ],
                [
                    'lable' => '優先順序',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'priority'
                ],
            ]

        ];
        return view('backend.create', $view);
    }

    public function store(Request $req)
    {

        $machineproduct = new MachineProduct;
        $content = $req->validate(
            [
                'product_id' => 'required',
                'machine_id' => 'required',
                'model_id' => 'required',
                'cycle_time' => 'required',
                'morning_employee' => 'required',
                'night_employee' => 'required',
                'cavity' => 'required',
                'non_performing_rate' => 'required',
                'priority' => 'required',
            ]
        );
        $machineproduct->create($content);

        return redirect('admin/machineProduct')->with('notice', '新增成功');
    }

    public function edit($id) //到編輯畫面
    {
        $machineProduct = MachineProduct::find($id);
        $view = [
            'action' => '/admin/machineProduct',
            'method' => 'PUT',
            'body' => [
                [
                    'lable' => '料號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'id',
                    'value' => $machineProduct->id
                ],
                [
                    'lable' => '機台編號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'machine_id',
                    'value' => $machineProduct->machine_id
                ],
                [
                    'lable' => '模具編號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'model_id',
                    'value' => $machineProduct->model_id
                ],
                [
                    'lable' => 'C/Ts',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'cycle_time',
                    'value' => $machineProduct->cycle_time
                ],
                [
                    'lable' => '日班人數',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'morning_employee',
                    'value' => $machineProduct->morning_employee
                ],
                [
                    'lable' => '夜班人數',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'night_employee',
                    'value' => $machineProduct->night_employee
                ],
                [
                    'lable' => '穴數',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'cavity',
                    'value' => $machineProduct->cavity
                ],
                [
                    'lable' => '不良率',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '0.01',
                    'name' => 'non_performing_rate',
                    'value' => $machineProduct->non_performing_rate
                ],
                [
                    'lable' => '優先順序',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'priority',
                    'value' => $machineProduct->priority
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
        $mp = machineProduct::find($req->id);
        $mp->id = $req->id;
        $mp->machine_id = $req->machine_id;
        $mp->model_id = $req->model_id;
        $mp->cycle_time = $req->cycle_time;
        $mp->morning_employee = $req->morning_employee;
        $mp->night_employee = $req->night_employee;
        $mp->cavity = $req->cavity;
        $mp->non_performing_rate = $req->non_performing_rate;
        $mp->priority = $req->priority;
        $mp->save();

        return redirect('admin/machineProduct')->with('notice', '編輯成功');
    }

    public function destroy($id)
    {
        machineProduct::destroy($id);
    }
}
