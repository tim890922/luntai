<?php

namespace App\Http\Controllers;

use App\Models\Process;
use App\Models\Product;
use App\Models\MachineProduct;
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
        $col = ['料號', '詳情', '刪除', '編輯'];
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
                ], [
                    'tag' => 'button',
                    'type' => 'button',
                    'class' => 'px-1 bg-red-500 rounded hover:bg-red-700',
                    'text' => '刪除',
                    'alertname' => $product->id,
                    'action' => 'delete',
                    'id' => $product->id
                ],
                [
                    'tag' => 'href',
                    'type' => '',
                    'class' => 'px-1 bg-blue-500 rounded hover:bg-blue-700',
                    'text' => '編輯',
                    'alertname' => $product->id,
                    'action' => 'edit',
                    'id' => $product->id,
                    'href' => 'product/edit/' . $product->id
                ]
            ];
            $row[] = $temp;
        }

        $view = [
            'col' => $col, 'header' => '製程清單', 'title' => '產品製程', 'row' => $row, 'action' => 'process/create', 'method' => 'GET', 'href' => 'process/create',
            'module' => 'process'
        ];
        return view('backend.admin', $view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        return view();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $product = Product::find($id);
    //     $machineProducts = MachineProduct::where('product_id', $id)->get();

    //     $queues = [];
    //     $arr = [];
    //     foreach ($product->processes as $p) {
    //         $count = 0;//每個製程有幾個機台
    //         foreach ($machineProducts as $mp) {
    //             if ($p->procedure == $mp->workstation->procedure) {
    //                 $count++;
    //             } else
    //                 continue;
    //         }
    //         for($i=0;$i<$count;$i++)
    //         {

    //         }
    //         $temp = [
    //             [
    //                 'queues' => $p->queue,
    //             ]
    //         ];

    //         $arr[] = $p->queue;

    //         $queues[] = $temp;
    //     }
    //     $mps = []; //排機的資料陣列
    //     foreach ($machineProducts as $mp) {
    //         $i = 0;

    //         $temp = [
    //             [
    //                 'queue' => '',
    //                 'workstationId' => $mp->workstation_id,
    //                 'name' => $mp->workstation->workstation_name,
    //                 'ct' => $mp->cycle_time,
    //                 'morningEmployee' => $mp->morning_employee,
    //                 'nightEmployee' => $mp->night_employee,
    //                 'nonPerforming' => $mp->non_performing_rate,
    //             ]
    //         ];
    //         $mps[] = $temp;
    //     }

    //     $contents = [
    //         'queue' => $arr,
    //         'mps' => $mps
    //     ]; //內容
    //     dd($contents);
    //     $view = [
    //         'header' => $product->id . '製程',
    //         'queues' => $queues,
    //         'contents' => $contents,
    //         'processes' => $product->processes,
    //         'contents' => $contents
    //     ];
    //     return view('backend.process.show', $view);
    // }


    public function show($id)
    {
        $product = Product::find($id);
        $machineProducts = MachineProduct::where('product_id', $id)->get();
        $contents = [];
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
                        'non_performing_rate' => $mp->non_performing_rate
                    ];
                    $init[] = $temp;
                } 
            }
            $contents[] = $init;
        }
        $button=[];
        foreach($product->processes as $p)
        {
            $temp=$p->procedure;
            $button[]=$temp;
        }
        // dd($contents);
        $view=[
            'contents'=>$contents,
            'header' => $product->id . '製程',
            'button'=>$button,
            'process_href'=>'/admin/process/create/' . $product->id,
            'workstation-href=>'
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
    }
}
