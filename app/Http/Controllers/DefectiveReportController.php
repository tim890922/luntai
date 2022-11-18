<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Defective;
use App\Models\DefectiveReport;
use App\Models\Report;

class DefectiveReportController extends Controller
{

    public function index(Request $req)
    {
        $defectivereports = DefectiveReport::all();
        $filter = $req->filter;

        $col = ['不良品編號', '進度回報編號', '原因', '數量', '備註', '不良品詳情', '查核', '刪除', '編輯'];

        $row = [];
        $subtitle = [
            'button' => [
                [
                    'text' => '缺料',
                    'href' => '/admin/defectiveReport'  . '?filter=1',
                    'value' => ''
                ],
                [
                    'text' => '縮水',
                    'href' => '/admin/defectiveReport'  . '?filter=2',
                    'value' => ''
                ],
                [
                    'text' => '包風',
                    'href' => '/admin/defectiveReport'  . '?filter=3',
                    'value' => ''
                ],
                [
                    'text' => '拉傷',
                    'href' => '/admin/defectiveReport'  . '?filter=4',
                    'value' => ''
                ],
                [
                    'text' => '油點',
                    'href' => '/admin/defectiveReport'  . '?filter=5',
                    'value' => ''
                ],
                [
                    'text' => '噴痕',
                    'href' =>  '/admin/defectiveReport'  . '?filter=6',
                    'value' => ''
                ],
                [
                    'text' => '刮傷',
                    'href' => '/admin/defectiveReport'  . '?filter=7',
                    'value' => ''
                ],
                [
                    'text' => '頂白',
                    'href' => '/admin/defectiveReport'  . '?filter=8',
                    'value' => ''
                ],
                [
                    'text' => '黑點',
                    'href' => '/admin/defectiveReport'  . '?filter=9',
                    'value' => ''
                ],
                [
                    'text' => '其他',
                    'href' => '/admin/defectiveReport'  . '?filter=10',
                    'value' => ''
                ],
            ]
        ];

        $d = [];

        switch ($filter) {
            case 'all':
                $d = DefectiveReport::all();
                break;
            case '1':
                $d = DefectiveReport::where('defective_id', '=', 1)->get();
                break;
            case '2':
                $d = DefectiveReport::where('defective_id', '=', 2)->get();
                break;
            case '3':
                $d = DefectiveReport::where('defective_id', '=', 3)->get();
                break;
            case '4':
                $d = DefectiveReport::where('defective_id', '=', 4)->get();
                break;
            case '5':
                $d = DefectiveReport::where('defective_id', '=', 5)->get();
                break;
            case '6':
                $d = DefectiveReport::where('defective_id', '=', 6)->get();
                break;
            case '7':
                $d = DefectiveReport::where('defective_id', '=', 7)->get();
                break;
            case '8':
                $d = DefectiveReport::where('defective_id', '=', 8)->get();
                break;
            case '9':
                $d = DefectiveReport::where('defective_id', '=', 9)->get();
                break;
            default:
                $d = DefectiveReport::all();
                break;
        }

        foreach ($d as $p) {
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
                    'action' => 'record',
                    'text' => ($p->record == 1) ? '確認' : '未確認',
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
            'module' => 'defectiveReport', 'subtitle' => $subtitle
        ];


        //    dd($view);
        return view('backend.admin', $view);
    }

    public function show($id)
    {
        $report = Report::find($id);
        $defectiveReports = DefectiveReport::where('report_id', $report->id)->get();

        $tbody = []; //不良品原因及數量
        foreach ($defectiveReports as $r) {
            $temp = [
                'reason' => $r->defective->reason,
                'quantity' => $r->quantity

            ];
            $tbody[] = $temp;
        }
        // dd($tbody);
        $table = [
            'th' => [
                [
                    'lable' => '不良品原因',
                ],
                [
                    'lable' => '不良品數量',
                ]
            ],
            'tb' => $tbody
        ];

        $view = [
            'header' => '不良品詳情',
            'title' => '不良品詳情',
            'table' => $table,
            // 'tbody'=>$tbody,
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
                    'lable' => '開始時間',
                    'text' => $report->time_start,
                ],
                [
                    'lable' => '結束時間',
                    'text' => $report->time_end,
                ],
                [
                    'lable' => '良品數量',
                    'text' => $report->good_product_quantity,
                ],
                [
                    'lable' => '不良品總量',
                    'text' => $report->defective_product_quantity,
                ]
            ],
        ];



        return view('backend.report.show', $view);
    }

    public function edit($id) //到編輯畫面
    {
        $defectivereport = DefectiveReport::find($id);
        $checked='';
        if($defectivereport->record==1)
            $checked='checked';
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
                    'tag' => 'checkbox',
                    'type' => 'checkbox',
                    'name' => 'check',
                    'id'=>'',
                    'checked'=>$checked

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
        // dd($req->request);
        $d->report_id = $req->report_id;
        $d->defective_id = $req->reason;
        $d->quantity = $req->quantity;
        $d->detail = $req->detail;
        $check = '編輯成功';
        if (isset($req['check'])) {
            $d->record = 1;
            $check = '確認成功';
        } else {
            $d->record = 0;
            
        }

        $d->save();


        return redirect('admin/defectiveReport')->with('notice', $check);
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
