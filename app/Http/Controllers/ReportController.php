<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Defective;
use App\Models\Report;

class ReportController extends Controller
{
    public function index()
    {
        $reasons = Defective::all();
        $reasonList = [];
        foreach ($reasons as $reason) {
            $temp = [
                'value' => $reason->id,
                'text' => $reason->reason
            ];
            $reasonList[] = $temp;
        }
        $view = [
            'body' => [

                'lists' => $reasonList,
                'name' => 'reason',

            ]
        ];

        return view('backend.report.index', $view);
    }

    public function list()
    {
        $reports = Report::all();
        $col = ['生產批號', '料號',  '員工姓名', '班別', '時段', '良品數', '不良品數', '確認', '刪除', '編輯'];

        $row = [];

        foreach ($reports as $p) {
            $temp = [
                [
                    'tag' => '',
                    'text' => $p->schedule_id,
                ],
                [
                    'tag' => '',
                    'text' => $p->product_id,
                ],

                [
                    'tag' => '',
                    'text' => $p->employee->name,
                ],
                [
                    'tag' => '',
                    'text' => $p->shift,
                ],
                [
                    'tag' => '',
                    'text' => ($p->time_start) . '-' . ($p->time_end),
                ],
                [
                    'tag' => '',
                    'text' => $p->good_product_quantity,
                ],
                [
                    'tag' => '',
                    'text' => $p->defective_product_quantity,
                ],
                [
                    'tag' => 'button',
                    'type' => 'button',
                    'class' => ($p->record == 0) ? 'px-1 bg-red-300 check rounded hover:bg-red-500' : 'px-1 bg-blue-500 check rounded hover:bg-blue-700',
                    'text' => ($p->record == 0) ? '未確認' : '確認',
                    'alertname' => '',
                    'action' => 'edit',
                    'id' => $p->id
                ],
                [
                    'tag' => 'button',
                    'type' => 'button',
                    'class' => 'px-1 bg-red-500 rounded hover:bg-red-700',
                    'text' => '刪除',
                    'alertname' => $p->schedule_id,
                    'action' => 'delete',
                    'id' => $p->id
                ],
                [
                    'tag' => 'href',
                    'type' => '',
                    'class' => 'px-1 bg-blue-500 rounded hover:bg-blue-700',
                    'text' => '編輯',
                    'alertname' => $p->id,
                    'action' => 'edit',
                    'id' => $p->id,
                    'href' => 'report/edit/' . $p->id
                ]
            ];
            $row[] = $temp;
        }
        // dd($row);

        $import = [
            'action' => 'productImport', 'text' => '匯入料號', 'file' => 'product_file'
        ];




        // dd($list);
        $view = [
            'col' => $col, 'header' => '生產進度回報清單', 'row' => $row, 'method' => 'GET',
            'module' => 'report'
        ];


        //    dd($view);
        return view('backend.admin', $view);
    }


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
        $report = Report::find($id);
        $view = [
            'action' => '/admin/report',
            'method' => 'PUT',
            'body' => [
                [
                    'tag' => 'input',
                    'type' => 'hidden',
                    'name' => 'id',
                    'value' => $report->id
                ],
                [
                    'lable' => '良品數量',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'min' => '0',
                    'name' => 'good_product_quantity',
                    'value' => $report->good_product_quantity
                ],
                [
                    'lable' => '不良品數量',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'min' => '0',
                    'name' => 'defective_product_quantity',
                    'value' => $report->defective_product_quantity
                ]
            ],
            'datas' => [
                [
                    'lable'=>'生產批號',
                    'text'=>$report->schedule_id
                ],
                [
                    'lable'=>'料號',
                    'text'=>$report->product_id
                ],
                [
                    'lable'=>'員工編號',
                    'text'=>$report->employee_id
                ],
                [
                    'lable'=>'班別',
                    'text'=>$report->shift
                ],
                [
                    'lable'=>'生產時段_開始',
                    'text'=>$report->time_start
                ],
                [
                    'lable'=>'生產時段_結束',
                    'text'=>$report->time_end
                ],
            ],
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
        $p = Report::find($req->id);

        $p->good_product_quantity = $req->good_product_quantity;
        $p->defective_product_quantity = $req->defective_product_quantity;
        $p->save();

        return redirect('admin/reportList')->with('notice', '編輯成功');
    }

    /**
     * Remove the specified resource from storage.
     *刪除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Report::destroy($id);
    }
}
