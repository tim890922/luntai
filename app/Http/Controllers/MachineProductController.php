<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MachineProduct;

class MachineProductController extends Controller
{
    public function index(){
        $machineproduct = MachineProduct::all();
        $col = ['料號', '機台編號', '模具編號','C/Ts','日班人數','夜班人數','穴數','不良率','優先順序','刪除','編輯'];

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
                    'text' => (($m->non_performing_rate)*100).'%',
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
                    'tag' => 'button',
                    'type' => 'button',
                    'class' => 'px-1 bg-blue-500 rounded hover:bg-blue-700',
                    'text' => '編輯',
                    'alertname' => $m->id,
                    'action' => 'edit',
                    'id' => $m->id
                ]
            ];
            $row[] = $temp;
        }



        $view = [
            'col' => $col, 
            'header' => '排機管理', 
            'title' => '排機', 
            'row' => $row, 
            'action' => 'machineproduct/create', 'method' => 'GET', 
            'href' => 'machineproduct/create',
            'module' => 'machineproduct'
        ];
        return view('backend.admin',$view);
    }

    public function create(){
        $view = [
            'action' => '/admin/machineproduct',
            'body' => [
                [
                    'lable' => '料號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'id'
                ],
                [
                    'lable' => '機台編號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'maqchine_id'
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
                    'name' => 'morining_employee'
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

        return redirect('admin/machineproduct')->with('notice', '新增成功');
    }

    public function destroy($id)
    {
        MachineProduct::destroy($id);
    }
}
