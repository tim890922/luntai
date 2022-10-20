<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workstation;
use App\Models\MachineProduct;

class WorkstationController extends Controller
{
    public function index()
    {
        $mps = MachineProduct::all();
        $col = ['工作站名稱', '料號', '工序', '刪除', '編輯']; //表格的標題

        $row = []; //表格的內容

        foreach ($mps as $m) {
            $temp = [
                [
                    'tag' => '',
                    'text' => $m->workstation->workstation_name,
                ],
                [
                    'tag' => '',
                    'text' => $m->product_id,
                ],
                [
                    'tag' => '',
                    'text' => $m->workstation->procedure,
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
                    'type' => 'button',
                    'class' => 'px-1 bg-blue-500 rounded hover:bg-blue-700',
                    'text' => '編輯',
                    'action' => 'edit',
                    'id' => $m->id,
                    'href' => 'workstation/edit/' . $m->id
                ],
            ];
            $row[] = $temp;
        }
        // dd($row);



        $view = [
            'col' => $col,
            'header' => '工作站管理',
            'title' => '工作站',
            'row' => $row,
            'action' => 'workstation/create',
            'method' => 'GET',
            'href' => 'workstation/create',
            'module' => 'workstation'
        ];


        //    dd($view);
        return view('backend.admin', $view);
    }


    public function create()
    {
        $view = [
            'action' => '/admin/workstation',
            'body' => [
                [
                    'lable' => '工作站名稱',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'workstation_name'
                ],
                [
                    'lable' => '工序',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'procedure'
                ],
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

        $w = new Workstation;
        $content = $req->validate(
            [
                'workstation_name' => 'required',
                'procedure' => 'required',
            ]
        );
        $w->create($content);

        return redirect('admin/workstation')->with('notice', '新增成功');
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
        $workstation = Workstation::find($id);
        $view = [
            'action' => '/admin/workstation',
            'method' => 'PUT',
            'body' => [
                [
                    'tag' => 'input',
                    'type' => 'hidden',
                    'name' => 'id',
                    'value' => $workstation->id
                ],
                [
                    'lable' => '工作站名稱',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'workstation_name',
                    'value' => $workstation->workstation_name
                ],
                [
                    'lable' => '工序',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'procedure',
                    'value' => $workstation->procedure
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
        $p = Workstation::find($req->id);

        $p->workstation_name = $req->workstation_name;
        $p->procedure = $req->procedure;
        $p->save();

        return redirect('admin/workstation')->with('notice', '編輯成功');
    }

    /**
     * Remove the specified resource from storage.
     *刪除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Workstation::destroy($id);
    }
}
