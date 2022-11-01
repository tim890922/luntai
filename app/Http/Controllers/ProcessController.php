<?php

namespace App\Http\Controllers;

use App\Models\Process;
use App\Models\Product;
use App\Models\MachineProduct;
use App\Models\Workstation;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processes = Process::all();
        $products = Product::all();
        $col = ['料號', '詳情'];
        $row = [];
        foreach ($products as $product) {
            $temp = [
                [
                    'tag' => '',
                    'text' => $product->id
                ],
                [
                    'tag' => 'href',
                    'type' => '',
                    'class' => 'px-1 bg-green-500 rounded hover:bg-green-700',
                    'alertname' => $product->id,
                    'action' => 'show',
                    'id' => $product->id,
                    'href' => 'process/show/' . $product->id,
                    'text' => '製程詳情'
                ],
                // [
                //     'tag' => 'button',
                //     'type' => 'button',
                //     'class' => 'px-1 bg-red-500 rounded hover:bg-red-700',
                //     'text' => '刪除',
                //     'alertname' => $product->id,
                //     'action' => 'delete',
                //     'id' => $product->id
                // ],
                // [
                //     'tag' => 'href',
                //     'type' => '',
                //     'class' => 'px-1 bg-blue-500 rounded hover:bg-blue-700',
                //     'text' => '編輯',
                //     'alertname' => $product->id,
                //     'action' => 'edit',
                //     'id' => $product->id,
                //     'href' => 'product/edit/' . $product->id
                // ]
            ];
            $row[] = $temp;
        }

        $view = [
            'col' => $col, 'header' => '製程清單',  'row' => $row, 'action' => 'process/create', 'method' => 'GET', 'href' => 'process/create',
            'module' => 'process'
        ];
        return view('backend.admin', $view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $workstations = Workstation::all();
        $lists = [
            [
                'value' => $workstations[0]->procedure,
                'text' => $workstations[0]->procedure
            ]
        ];
        $count = 0;
        foreach ($workstations as $workstation) {

            if (!in_array($workstation->procedure, $lists[$count])) {

                $temp =
                    [
                        'value' => $workstation->procedure,
                        'text' => $workstation->procedure
                    ];
                $lists[] = $temp;
                $count++;
            }
        }

        $view = [
            'action' => '/admin/process',
            'header' => '新增製程',
            'id' => 'insert-process',
            'btn' => 'insert-p',
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
                    'lable' => '製程',
                    'tag' => 'select',
                    'type' => '',
                    'name' => 'procedure',
                    'lists' => $lists
                ]
            ]
        ];
        return view('component.modal', $view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $p = new Process;
        $p_queues = Process::where('product_id', $req->product_id)->get();
        $count = 0;
        foreach ($p_queues as $q) {
            $count++;
        }
        $content = $req->validate(
            [
                'product_id' => 'required',
                'procedure' => 'required',
            ]
        );
        $content['queue'] = $count + 1;
        // dd($content);
        $p->create($content);

        return back()->with('notice', '新增成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $machineProducts = MachineProduct::where('product_id', $id)->get();
        $contents = []; //每個製程裡面的內容
        $button = []; //每個產品的製程按鈕
        $delete = []; //每個製程的刪除按
        $workstationList = []; //新增工作站的按鈕選單
        for ($i = 0; $i < count($product->processes); $i++) {
            $init = [];
            foreach ($machineProducts as $mp) {
                $count = 0;
                if ($mp->workstation->procedure == $product->processes[$i]->procedure) {
                    $count++;
                    $temp = [
                        'name' => $mp->workstation->workstation_name,
                        'ct' => $mp->cycle_time,
                        'morning_employee' => $mp->morning_employee,
                        'night_employee' => $mp->night_employee,
                        'non_performing_rate' => $mp->non_performing_rate,
                        'dataId' => $mp->id
                    ];
                    $init[] = $temp;
                } else
                    continue;
            }
            $contents[] = $init;
            $workstations = Workstation::where('procedure', $product->processes[$i]->procedure)->get();
            $temp = [];
            foreach ($workstations as $workstation) {
                $temp[] = [
                    'text' => $workstation->workstation_name,
                    'value' => $workstation->id
                ];


                $workstationList[$i] = $temp;
                $workstation_body[$i] = [
                    'header' => '新增工作站',
                    'action' => '/admin/machintProduct',
                    'id' => 'insert-workstation' . $i,
                    'btn' => 'insert-p' . $i,
                    'body' => [
                        [
                            'lable' => '料號',
                            'tag' => 'input',
                            'type' => 'text',
                            'name' => 'product_id',
                            'value' => $id
                        ],
                        [
                            'lable' => '工作站',
                            'tag' => 'select',
                            'type' => '',
                            'name' => 'id',
                            'lists' => $workstationList[$i],
                        ]
                    ]
                ];
            }
        }
        // dd($workstationList[1]);
        // dd($contents, $workstationList);
        // dd($workstation_body);



        foreach ($product->processes as $p) {
            $temp = $p->procedure;
            $button[] = $temp;
        }
        foreach ($product->processes as $p) {
            $temp = [

                'tag' => 'button',
                'type' => 'submit',
                'class' => 'px-1 mr-3 bg-red-300 rounded hover:bg-red-500',
                'text' => '刪除此製程',
                'alertname' => $p->procedure,
                'action' => 'delete',
                'id' => $p->id

            ];
            $delete[] = $temp;
        }
        $delete['method'] = 'delete';
        // dd($delete);
        // dd($contents);
        $workstations = Workstation::all();
        $lists = [
            [
                'value' => $workstations[0]->procedure,
                'text' => $workstations[0]->procedure
            ]
        ];
        $count = 0;
        foreach ($workstations as $workstation) {

            if (!in_array($workstation->procedure, $lists[$count])) {

                $temp =
                    [
                        'value' => $workstation->procedure,
                        'text' => $workstation->procedure
                    ];
                $lists[] = $temp;
                $count++;
            }
        }

        // dd($lists);


        $process_body = [
            'header' => '新增製程',
            'action' => '/admin/process',
            'id' => 'insert-process',
            'btn' => 'insert-p',
            'body' => [
                [
                    'lable' => '料號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'product_id',
                    'value' => $id
                ],
                [
                    'lable' => '製程',
                    'tag' => 'select',
                    'type' => '',
                    'name' => 'procedure',
                    'lists' => $lists
                ]
            ]
        ];





        // dd($contents);
        $view = [
            'id' => $id,
            'contents' => $contents,
            'header' => $product->id . '製程',
            'button' => $button,
            'process' => $process_body,
            'delete' => $delete,
            'workstation' => $workstation_body,
        ];
        return view('backend.process.show', $view);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $p_id = Process::find($id)->product_id;
        Process::destroy($id);

        return redirect('admin/process/show/' . $p_id)->with('notice', '刪除成功');
    }
}
