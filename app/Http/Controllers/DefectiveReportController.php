<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Defective;
use App\Models\DefectiveReport;
use App\Models\Report;

class DefectiveReportController extends Controller
{

    public function index()
    {
        $defectivereports = DefectiveReport::all();
        $col = ['不良品編號', '進度回報編號', '原因', '數量', '備註', '不良品詳情', '查核', '刪除', '編輯'];

        $row = [];

        foreach ($defectivereports as $p) {
            $temp = [
                [
                    'tag' => '',
                    'text' => $p->id,
                ],
                [
                    'tag' => '',
                    'text' => $p->report_id,
                ],

                [
                    'tag' => '',
                    'text' => $p->defective->reason,
                ],
                [
                    'tag' => '',
                    'text' => $p->quantity,
                ],
                [
                    'tag' => '',
                    'text' => $p->detail,
                ],
                [
                    'tag' => 'href',
                    'type' => '',
                    'class' => 'px-1 bg-gray-500 rounded hover:bg-gray-700',
                    'text' => '不良品詳情',
                    'alertname' => $p->id,
                    'action' => 'show',
                    'id' => $p->id,
                    'href' => 'defectiveReport/show/' . $p->report_id
                ],
                [
                    'tag' => '',
                    'type' => 'text',
                    'action' => 'comfirm',
                    'text' => ($p->comfirm == 1) ? '確認' : '未確認',
                    'id' => $p->id,
                ],
                [
                    'tag' => 'button',
                    'type' => 'button',
                    'class' => 'px-1 bg-red-500 rounded hover:bg-red-700',
                    'text' => '刪除',
                    'alertname' => $p->id,
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
                    'href' => 'defectiveReport/edit/' . $p->id
                ]
            ];
            $row[] = $temp;
        }

        // dd($list);
        $view = [
            'col' => $col, 'header' => '不良品管理', 'row' => $row,  'method' => 'GET',
            'module' => 'defectiveReport'
        ];


        //    dd($view);
        return view('backend.admin', $view);
    }

    public function show($id)
    {
        $report = Report::find($id);
        $defectiveReports = DefectiveReport::where('report_id', $report->id)->get();


        $view = [
            'header' => '不良品詳情',
            'title' => '不良品詳情',
            'body' =>  [
                
                [
                    'lable' => '生產批號',
                    'text' => $report->schedule->id,
                ],
                [
                    'lable' => '進度回報編號',
                    'text' => $report->id,
                ],
                [
                    'lable' => '員工編號',
                    'text' => $report->employee->id,
                ],
                [
                    'lable' => '班別',
                    'text' => $report->shift,
                ],
                [
                    'lable' => '進度回報編號',
                    'text' => $report->id,
                ],
                [
                    'lable' => '進度回報編號',
                    'text' => $report->id,
                ],
                [
                    'lable' => '進度回報編號',
                    'text' => $report->id,
                ],
                [
                    'lable' => '進度回報編號',
                    'text' => $report->id,
                ],
                [
                    'lable' => '進度回報編號',
                    'text' => $report->id,
                ],
                [
                    'lable' => '進度回報編號',
                    'text' => $report->id,
                ],
            ]
        ];
        return view('backend.report.show', $view);
    }

    public function edit($id) //到編輯畫面
    {
        $defectivereport = DefectiveReport::find($id);

        $reason = [];
        $defectives = Defective::all();
        foreach ($defectives as $d) {
            $select = '';
            if ($d->reason == $defectivereport->defective->reason)
                $select = 'selected';


            $temp = [
                'value' => $d->id,
                'text' => $d->reason,
                'selected' => $select
            ];
            $reason[] = $temp;
        }



        $view = [
            'action' => '/admin/defectiveReport',
            'method' => 'PUT',
            'body' => [
                [
                    'tag' => 'input',
                    'type' => 'hidden',
                    'name' => 'id',
                    'value' => $id
                ],
                [
                    'lable' => '進度回報編號',
                    'tag' => 'input',
                    'text' => $defectivereport->report_id,
                    'type' => 'text',
                    'name' => 'report_id',
                    'value' => $defectivereport->report_id,
                    'readonly' => ''
                ],
                [
                    'lable' => '不良原因',
                    'tag' => 'select',
                    'lists' => $reason,
                    'name' => 'reason'
                ],
                [
                    'lable' => '數量',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'quantity',
                    'value' => $defectivereport->quantity
                ],
                [
                    'lable' => '備註',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'detail',
                    'value' => $defectivereport->detail
                ],
                [
                    'lable' => '主管查核確認',
                    'tag' => 'input',
                    'type' => 'checkbox',
                    'name' => 'check',

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
        $d = DefectiveReport::find($req->id);

        $d->report_id = $req->report_id;
        $d->defective_id = $req->reason;
        $d->quantity = $req->quantity;
        $d->detail = $req->detail;
        $d->save();


        return redirect('admin/defectiveReport')->with('notice', '編輯成功');
    }

    /**
     * Remove the specified resource from storage.
     *刪除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DefectiveReport::destroy($id);
    }
}
