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
        $defectivereports = Report::all();
        $filter = $req->filter;

        $col = ['進度回報編號', '料號', '不良品詳情', '查核'];

        $row = [];
        $class = 'p-3 mx-3 bg-blue-300 border rounded-full cursor-pointer hover:bg-blue-500';
        $subtitle = [
            'button' => [
                // [
                //     'text' => '缺料',
                //     'href' => '/admin/defectiveReport'  . '?filter=1',
                //     'value' => '',
                //     'class'=>$class
                // ],
                // [
                //     'text' => '縮水',
                //     'href' => '/admin/defectiveReport'  . '?filter=2',
                //     'value' => '',
                //     'class'=>$class
                // ],
                // [
                //     'text' => '包風',
                //     'href' => '/admin/defectiveReport'  . '?filter=3',
                //     'value' => '',
                //     'class'=>$class
                // ],
                // [
                //     'text' => '拉傷',
                //     'href' => '/admin/defectiveReport'  . '?filter=4',
                //     'value' => '',
                //     'class'=>$class
                // ],
                // [
                //     'text' => '油點',
                //     'href' => '/admin/defectiveReport'  . '?filter=5',
                //     'value' => '',
                //     'class'=>$class
                // ],
                // [
                //     'text' => '噴痕',
                //     'href' =>  '/admin/defectiveReport'  . '?filter=6',
                //     'value' => '',
                //     'class'=>$class
                // ],
                // [
                //     'text' => '刮傷',
                //     'href' => '/admin/defectiveReport'  . '?filter=7',
                //     'value' => '',
                //     'class'=>$class
                // ],
                // [
                //     'text' => '頂白',
                //     'href' => '/admin/defectiveReport'  . '?filter=8',
                //     'value' => '',
                //     'class'=>$class
                // ],
                // [
                //     'text' => '黑點',
                //     'href' => '/admin/defectiveReport'  . '?filter=9',
                //     'value' => '',
                //     'class'=>$class
                // ],
                // [
                //     'text' => '其他',
                //     'href' => '/admin/defectiveReport',
                //     'value' => '',
                //     'class'=>$class
                // ],
                [
                    'text' => '查看圖表',
                    'href' => '/admin/defectiveChart',
                    'value' => '',
                    'class' => 'p-3 mx-3 py-1 bg-orange-300 border rounded-full cursor-pointer hover:bg-orange-500 '
                ],
            ]
        ];

        $d = [];

        switch ($filter) {
            case 'all':
                $d = Report::all();
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
                $d = Report::all();
                break;
        }
        $isCheck = '確認';

        foreach ($d as $p) {
            $defectiveReport = DefectiveReport::where('report_id', $p->id)->get();
            foreach ($defectiveReport as $d) {
                if ($d->record == 0) {
                    $isCheck = '未確認';
                    break;
                }
            }
            $temp = [
                [
                    'tag' => '',
                    'text' => $p->id,
                ],
                [
                    'tag' => '',
                    'text' => $p->product_id,
                ],
                [
                    'tag' => 'href',
                    'type' => '',
                    'class' => 'px-1 bg-gray-500 rounded hover:bg-gray-700',
                    'text' => '不良品詳情',
                    'alertname' => $p->id,
                    'action' => 'show',
                    'id' => $p->id,
                    'href' => '/admin/defectiveReport/show/' . $p->id
                ],
                [
                    'tag' => '',
                    'type' => 'text',
                    'action' => 'record',
                    'text' => $isCheck,
                    'id' => $p->id,
                ],
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
                'quantity' => $r->quantity,
                'commend' => $r->detail,
                'edit' => [
                    'tag' => 'href',
                    'type' => '',
                    'class' => 'px-1 bg-blue-500 rounded hover:bg-blue-700',
                    'text' => '編輯',
                    'action' => 'edit',
                    'id' => $r->id,
                    'href' => 'edit/' . $r->id
                ],
                'check' =>
                [
                    'tag' => 'button',
                    'type' => 'button',
                    'class' => 'px-1 bg-green-300 rounded hover:bg-green-500',
                    'text' => ($r->record == 1) ? '已確認' : '未確認',
                    'action' => 'check',
                    'id' => $r->id
                ]
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
                ],
                [
                    'lable' => '備註'
                ],
                [
                    'lable' => '編輯'
                ],
                [
                    'lable' => '查核'
                ]
            ],
            'tb' => $tbody
        ];

        $view = [
            'header' => $report->product->id . '的不良品詳情',
            'title' => '不良品詳情',
            'table' => $table,
            // 'tbody'=>$tbody,
            'body' =>  [

                [
                    'lable' => '訂單編號',
                    'text' => $report->schedule->order_id,
                ],
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
                    'lable' => '生產日期',
                    'text' => $report->schedule->today,
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
        $defectiveReport = DefectiveReport::find($id);

        $view = [
            'action' => '/admin/defectiveReport',
            'method' => 'PUT',
            'body' => [
                [
                    'lable' => '',
                    'tag' => 'input',
                    'type' => 'hidden',
                    'name' => 'id',
                    'value' => $id
                ],
                [
                    'lable' => '原因',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'reason',
                    'readonly' => 'reason',
                    'value' => $defectiveReport->defective->reason
                ],
                [
                    'lable' => '數量',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => 1,
                    'name' => 'quantity',
                    'value' => $defectiveReport->quantity
                ],
                [
                    'lable' => '備註',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'detail',
                    'value' => $defectiveReport->detail
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
        // dd($req->id);

        $d = DefectiveReport::find($req->id);
        // dd($req->request);
        $d->quantity = $req->quantity;
        $d->detail = $req->detail;
        $total = 0;
        $ds = DefectiveReport::where('report_id', $d->report_id)->get();
        $check = '編輯成功';
        if (isset($req['check'])) {
            $d->record = 1;
            $check = '確認成功';
        } else {
            $d->record = 0;
        }
        $d->save();
        foreach ($ds as $ds) {
            $total += $ds->quantity;
        }
        $report = Report::find($d->report_id);
        $report->defective_product_quantity = $total;
        $report->save();



        return redirect('admin/defectiveReport/show/' . $report->id)->with('notice', $check);
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

    public function chart()
    {


        return view('backend.defective.chart');
    }

    public function getDefective(Request $req)
    {
        // dd($form);
        $from = date($req->start);
        $to = date($req->end);
        $defectiveReport = DefectiveReport::whereBetween('created_at', [$from, $to])->get();
        $defectiveReasons = Defective::all();
        $lables = [];
        $data = [];


        foreach ($defectiveReasons as $d) {
            $temp = $d->reason;
            $lables[] = $temp;
        }


        for ($i = 0; $i < count($lables); $i++) {
            $sum = 0;
            foreach ($defectiveReport as $dr) {
                if ($dr->defective->reason == $lables[$i]) {
                    $sum += $dr->quantity;
                }
            }
            $temp = $sum;
            $data[$lables[$i]] = $temp;
        }


        // $chart = [
        //     'labels' => array_keys($data),
        //     'data' => array_values($data)

        // ];
        return [
            'labels' => array_keys($data),
            'data' => array_values($data)
        ];
    }

    public function check($id)
    {
        $defectiveReport = DefectiveReport::find($id);
        $message = '';
        if ($defectiveReport->record == 0) {
            $defectiveReport->record = 1;
            $message = '已確認';
        } else {
            $defectiveReport->record = 0;
            $message = '取消確認成功';
        }
        $defectiveReport->save();

        return $message;
    }
}
