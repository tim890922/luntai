<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MachineProduct;
use App\Models\Machine;
use App\Models\Workstation;

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
            'header' => '排機資料',
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
        $lists = [];
        foreach ($machines as $machine) {
            $temp = [
                'value' => $machine->id,
                'text' => $machine->id
            ];
            $lists[] = $temp;
        }
        //  dd($lists);
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
                    'lists' => $lists,
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
        // dd($req);
        $mp = new MachineProduct;
        // $mp->product_id = $req->product_id;
        // $mp->workstation_id = $req->workstation_id;
        // $mp->cycle_time = $req->cycle_time;
        // $mp->morning_employee = $req->morning_employee;
        // $mp->night_employee = $req->night_employee;
        // $mp->non_performing_rate = $req->non_performing_rate;
        $content = $req->validate(
            [
                'product_id' => 'required',
                'workstation_id' => 'required',
                'cycle_time' => 'required',
                'morning_employee' => 'required',
                'night_employee' => 'required',
                'non_performing_rate' => 'required',
            ]
        );
        // $machineproduct->create($content);
        $content['non_performing_rate']/=100;
        $mp->create($content);

        return back()->with('notice', '新增成功');
    }

    public function edit($id) //到編輯畫面
    {
        $machineProduct = MachineProduct::find($id);
        $procedure = $machineProduct->workstation->procedure;
        // dd($procedure);
        $workstations = Workstation::where('procedure', $procedure)->get();
        $lists = []; //工作站清單
        foreach ($workstations as $workstation) {
            $temp = [
                'text' => $workstation->workstation_name,
                'value' => $workstation->id,
            ];
            $lists[] = $temp;
        }
        // dd($lists);
        $view = [
            'action' => '/admin/machineProduct',
            'method' => 'PUT',
            'header' => '編輯工作站',
            'footer' => '',
            'body' => [
                [
                    'lable' => '料號',
                    'tag' => '',
                    'type' => 'text',
                    'name' => 'id',
                    'value' => $machineProduct->product->id
                ],
                [
                    'lable' => '工作站名稱',
                    'tag' => 'select',
                    'type' => ' ',
                    'name' => 'workstation_id',
                    'lists' => $lists
                ],

                [
                    'lable' => 'C/T(s)',
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
                    'lable' => '不良率',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '0.01',
                    'name' => 'non_performing_rate',
                    'value' => $machineProduct->non_performing_rate
                ],
                [
                    'lable' => '',
                    'tag' => 'input',
                    'type' => 'hidden',
                    'step' => '0.01',
                    'name' => 'id',
                    'value' => $id
                ],

            ]
        ];
        return view('component.modal', $view);
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
        $mp = MachineProduct::find($req->id);
        $mp->workstation_id = $req->workstation_id;
        $mp->cycle_time = $req->cycle_time;

        $mp->morning_employee = $req->morning_employee;
        $mp->night_employee = $req->night_employee;
        $mp->non_performing_rate = $req->non_performing_rate;
        $mp->save();

        return back()->with('notice', '編輯成功');
    }

    public function destroy($id)
    {
        machineProduct::destroy($id);
        return back()->with('notice', '刪除成功');
    }

    public function add($id)
    {
        // $machineProduct = MachineProduct::find($id);
        // $procedure = $machineProduct->workstation->procedure;
        // dd($procedure);
        $workstations = Workstation::all();
        $lists = []; //工作站清單
        foreach ($workstations as $workstation) {
            $temp = [
                'text' => $workstation->workstation_name,
                'value' => $workstation->id,
            ];
            $lists[] = $temp;
        }
        // dd($lists);
        $view = [
            'action' => '/admin/machineProduct',
            'method' => 'POST',
            'header' => '新增工作站',
            'footer' => '',
            'body' => [
                [
                    'lable' => '料號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'product_id',
                    'value' => $id
                ],
                [
                    'lable' => '工作站名稱',
                    'tag' => 'select',
                    'type' => ' ',
                    'name' => 'workstation_id',
                    'lists' => $lists
                ],

                [
                    'lable' => 'C/T(s)',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'cycle_time',

                ],
                [
                    'lable' => '日班人數',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'morning_employee',

                ],
                [
                    'lable' => '夜班人數',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'night_employee',

                ],
                [
                    'lable' => '不良率(%)',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '0.1',
                    'name' => 'non_performing_rate'
                ]
            ]
        ];
        return view('component.modal', $view);
    }
}
