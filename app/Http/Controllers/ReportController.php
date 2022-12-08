<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Defective;
use App\Models\Report;
use App\Models\Schedule;
use App\Models\DefectiveReport;

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
    public function scheduleList()
    {   //員工進度回報
        $schedules = Schedule::where('isAssign', 1)->where('isFinish', 0)->get();
        $col = ['生產批號', '料號', '日期',  '開始時間', '結束時間', '內容', '預計總產量', '進度回報清單', '進度回報'];

        $row = [];

        foreach ($schedules as $s) {
            if (!($s->content == '換模')) {
                $temp = [
                    [
                        'tag' => '',
                        'text' => $s->id
                    ],
                    [
                        'tag' => '',
                        'text' => $s->product_id
                    ],
                    [
                        'tag' => '',
                        'text' => $s->today
                    ],
                    [
                        'tag' => '',
                        'text' => $s->period_start
                    ],
                    [
                        'tag' => '',
                        'text' => $s->period_end
                    ],
                    [
                        'tag' => '',
                        'text' => $s->content
                    ],
                    [
                        'tag' => '',
                        'text' => $s->total_quantity
                    ],
                    [
                        'tag' => 'href',
                        'type' => 'button',
                        'class' => 'px-1 bg-yellow-300 rounded hover:bg-yellow-500',
                        'text' => '進度回報清單',
                        'alertname' => $s->id,
                        'action' => '',
                        'id' => $s->id,
                        'href' => '/admin/report/list/' . $s->id
                    ],
                    [
                        'tag' => 'href',
                        'type' => 'button',
                        'class' => 'px-1 bg-blue-500 rounded hover:bg-blue-700',
                        'text' => '進度回報',
                        'alertname' => $s->id,
                        'action' => '',
                        'id' => $s->id,
                        'href' => '/admin/report/create/' . $s->id
                    ],

                ];
                $row[] = $temp;
            }
        }



        $view = [
            'col' => $col, 'header' => '進度回報', 'row' => $row, 'action' => 'product/create', 'method' => 'GET', 'href' => '',
            'module' => 'schedule',
        ];

        //    dd($view);
        return view('backend.admin', $view);
    }

    public function create($id)
    {
        $defectives = Defective::all();
        $tbody = [];
        foreach ($defectives as $d) {
            $temp = [
                'lable' => $d->reason,
                'input' => [
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => 1,
                    'name' => $d->reason . '_quantity',
                ],
                'commend' => [
                    'tag' => 'input',
                    'type' => 'text',
                    'name' =>  $d->reason . 'commend',
                ]
            ];
            $tbody[] = $temp;
        }
        $schedule = Schedule::find($id);
        // dd($schedule);
        $body = [
            [
                'lable' => '生產批號',
                'tag' => '',
                'type' => '',
                'name' => 'schedule_id',
                'value' => $id,
                'text' => $id,
                'readonly' => ''
            ],
            [
                'lable' => '料號',
                'tag' => '',
                'type' => '',
                'name' => 'product_id',
                'text' => $schedule->product_id,
                'value' => $schedule->product_id,
                'readonly' => ''
            ],
            [
                'lable' => '機台名稱',
                'tag' => '',
                'type' => '',
                'name' => 'workstation_name',
                'text' => $schedule->workstation->workstation_name,
                'value' => $schedule->workstation_id,
                'readonly' => ''
            ],
            [
                'lable' => '日期',
                'tag' => '',
                'type' => '',
                'name' => 'today',
                'text' => date('Y/m/d'),
                'value' => date('Y/m/d'),
            ],
            [
                'lable' => '員工編號',
                'tag' => '',
                'type' => 'text',
                'value' => (session()->get('user'))->id,
                'text' => (session()->get('user'))->id,
                'name' => 'employee_id',
                'readonly' => ''
            ],
            [
                'lable' => '班別',
                'tag' => 'select',
                'lists' => [
                    [
                        'text' => 'A',
                        'value' => 'A'
                    ],
                    [
                        'text' => 'B',
                        'value' => 'B'
                    ],
                    [
                        'text' => 'C',
                        'value' => 'C'
                    ],
                ],
                'name' => 'shift',
            ],
            [
                'lable' => '開始時間',
                'tag' => 'input',
                'type' => 'time',
                'name' => 'time_start',
                'value' => date("08:00")
            ],
            [
                'lable' => '結束時間',
                'tag' => 'input',
                'type' => 'time',
                'name' => 'time_end',
                'value' => date("H:i")
            ],
            [
                'lable' => '良品數量',
                'tag' => 'input',
                'type' => 'number',
                'step' => '1',
                'name' => 'good_product_quantity',
            ],
            [
                'lable' => '',
                'tag' => 'input',
                'type' => 'hidden',
                'name' => 'schedule_id',
                'value' => $id,
                'text' => $id,
                'readonly' => ''
            ],
            [
                'lable' => '',
                'tag' => 'input',
                'type' => 'hidden',
                'name' => 'product_id',
                'text' => $schedule->product_id,
                'value' => $schedule->product_id,
                'readonly' => ''
            ],
            [
                'lable' => '',
                'tag' => 'input',
                'type' => 'hidden',
                'name' => 'workstation_name',
                'text' => $schedule->workstation->workstation_name,
                'value' => $schedule->workstation_id,
                'readonly' => ''
            ],
            [
                'lable' => '',
                'tag' => 'input',
                'type' => 'hidden',
                'name' => 'today',
                'text' => date('Y/m/d'),
                'value' => date('Y/m/d'),
                'readonly' => ''
            ],
            [
                'lable' => '',
                'tag' => 'input',
                'type' => 'hidden',
                'value' => (session()->get('user'))->id,
                'name' => 'employee_id',
                'readonly' => ''
            ],
            [
                'lable' => '',
                'tag' => 'input',
                'type' => 'hidden',
                'name' => 'today',
                'text' => date('Y/m/d'),
                'value' => date('Y/m/d'),
            ],

        ];

        $table = [
            'th' => [
                [
                    'lable' => '不良品原因',
                ],
                [
                    'lable' => '不良品數量',
                ],
                [
                    'lable' => '備註',
                ]
            ],
            'tb' => $tbody
        ];
        // dd($table['tb']);

        $view = [
            'header' => '生產批號' . $id . ' 進度回報',
            'body' => $body, 'table' => $table
        ];
        return view('backend.report.create', $view);
    }

    public function store(Request $req)
    {
        // dd($req);
        $reason = Defective::all();
        $defective_product_total_quantity = 0;
        foreach ($reason as $r) {
            $reasonQ = ($r->reason) . '_quantity';
            $reasonC = ($r->reason) . 'commend';
            if (!$req->$reasonQ == null && !$req->$reasonQ == 0) {
                $defective_product_total_quantity += ($req->$reasonQ);
            }
        }
        $report = new Report;
        $report->schedule_id = $req->schedule_id;
        $report->employee_id = $req->employee_id;
        $report->product_id = $req->product_id;
        $report->shift = $req->shift;
        $report->time_start = $req->time_start;
        $report->time_end = $req->time_end;
        $report->good_product_quantity = $req->good_product_quantity;





        $report->defective_product_quantity = $defective_product_total_quantity;
        $report->save();
        foreach ($reason as $reason) {
            $reasonQ = ($reason->reason) . '_quantity';
            $reasonC = ($reason->reason) . 'commend';
            if (!$req->$reasonQ == null && !$req->$reasonQ == 0) {
                $dr = new DefectiveReport; //生產批號不良
                $dr->defective_id = $reason->id;
                $dr->report_id = $report->id;

                $dr->quantity = ($req->$reasonQ);
                $dr->detail = ($req->$reasonC);
                $dr->save();
            }
        }
        return redirect('admin/report')->with('notice', '回報成功');
    }



    public function list()
    {   //生產進度回報
        $reports = Report::all();
        $schedule = Schedule::where('isAssign', 1)->get();
        $col = ['生產批號', '訂單號', '客戶', '料號', '日期', '時段', '是否完成', '回報清單'];

        $row = [];

        foreach ($schedule as $p) {
            $temp = [
                [
                    'tag' => '',
                    'text' => $p->id,
                ],
                [
                    'tag' => '',
                    'text' => $p->order_id,
                ],
                [
                    'tag' => '',
                    'text' => $p->order->clientuser->client->client_name,
                ],
                [
                    'tag' => '',
                    'text' => $p->product_id,
                ],

                [
                    'tag' => '',
                    'text' => $p->today,
                ],
                [
                    'tag' => '',
                    'text' => $p->period_start . '-' . $p->period_end,
                ],
                [
                    'tag' => '',
                    'text' => ($p->isFinish == 0) ? '未完成' : '已完成',
                    'class' => ($p->isFinish == 0) ? 'bg-red-300' : 'bg-green-300'
                ],
                [
                    'tag' => 'href',
                    'type' => '',
                    'class' => 'px-1 bg-blue-500 rounded hover:bg-blue-700',
                    'text' => '回報清單',
                    'action' => 'show',
                    'id' => '',
                    'href' => '/admin/report/show/' . $p->id
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
        $reports = Report::where('schedule_id', $id)->get();
        $schedule = Schedule::find($id);
        $col = [
            '進度回報編號', '料號', '員工', '班別', '生產時段', '良品數', '不良品總數', '刪除', '編輯', '查核'
        ];
        $row = [];

        foreach ($reports as $p) {
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
                    'tag' => '',
                    'text' => $p->employee->name,
                ],
                [
                    'tag' => '',
                    'text' => $p->shift,
                ],
                [
                    'tag' => '',
                    'text' => $p->time_start . '-' . $p->time_end,
                ],
                [
                    'tag' => '',
                    'text' => $p->good_product_quantity,
                ],
                [
                    'tag' => 'href',
                    'type' => '',
                    'text' => $p->defective_product_quantity,
                    'action' => '',
                    'href' => '/admin/defectiveReport/show/' . $p->id,
                    'id' => '',
                    'class' => 'hover:text-blue-500',
                ],
                [
                    'tag' => 'button',
                    'type' => 'button',
                    'class' => 'px-1 bg-red-500 rounded hover:bg-red-700',
                    'text' => '刪除',
                    'alertname' => '進度回報編號 ' . $p->id,
                    'action' => 'delete',
                    'id' => $p->id
                ],
                [
                    'tag' => 'href',
                    'type' => 'button',
                    'class' => 'px-1 bg-blue-500 rounded hover:bg-blue-700',
                    'text' => '編輯',
                    'action' => 'edit',
                    'id' => $p->id,
                    'href' => '/admin/defectiveReport/show/' . $p->id
                ],
                [
                    'tag' => 'button',
                    'type' => 'button',
                    'action' => 'check',
                    'class' => 'px-1 bg-green-500 rounded hover:bg-green-700',
                    'text' => ($p->record == 1) ? '已確認' : '未確認',
                    'id' => $p->id
                ]
            ];
            $row[] = $temp;
        }
        $text = '未完成';
        if ($schedule->isFinish == 1)
            $text = '已完成';

        $view = [
            'col' => $col, 'header' => '生產批號' . $id . '', 'row' => $row, 'method' => 'GET',
            'module' => 'report', 'history' => '/admin/reportList',
            'finish' => ['id' => $id, 'text' => $text]
        ];
        return view('backend.admin', $view);
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
                    'lable' => '生產批號',
                    'text' => $report->schedule_id
                ],
                [
                    'lable' => '料號',
                    'text' => $report->product_id
                ],
                [
                    'lable' => '員工編號',
                    'text' => $report->employee_id
                ],
                [
                    'lable' => '班別',
                    'text' => $report->shift
                ],
                [
                    'lable' => '生產時段_開始',
                    'text' => $report->time_start
                ],
                [
                    'lable' => '生產時段_結束',
                    'text' => $report->time_end
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
        return "刪除成功";
    }

    public function check($id)
    {
        $report = Report::find($id);
        $text = '';
        if ($report->record == 0) {
            $report->record = 1;
            $text = '確認成功';
        } else {
            $report->record = 0;
            $text = '取消確認成功';
        }


        $report->save();
        return $text;
    }

    public function finish($id)
    {
        $schedule = Schedule::find($id);
        $reports = Report::where('schedule_id', $id)->get();
        // dd($reports);
        if (isset($reports)) {
            foreach ($reports as $report) {
                if ($report->record == 0) {
                    return ['alert' => "進度回報未查核完成"];
                }
            }
        } else {
            return ['alert' => '沒有進度回報'];
        }


        if ($schedule->isFinish == 1) {
            $schedule->isFinish = 0;
            $schedule->save();
            return ['alert' => "取消完成", 'text' => '未完成'];
        }
        $schedule->isFinish = 1;
        $schedule->save();
        $message = '完成';
        return ['alert' => "完成", 'text' => '已完成'];
    }

    public function reportList($id)
    {
        $reports = Report::where('schedule_id', $id)->get();
        $col = [
            '進度回報編號', '料號', '員工', '班別', '生產時段', '良品數', '不良品總數'
        ];
        $row = [];
        foreach ($reports as $p) {
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
                    'tag' => '',
                    'text' => $p->employee->name,
                ],
                [
                    'tag' => '',
                    'text' => $p->shift,
                ],
                [
                    'tag' => '',
                    'text' => $p->time_start . '-' . $p->time_end,
                ],
                [
                    'tag' => '',
                    'text' => $p->good_product_quantity,
                ],
                [
                    'tag' => '',
                    'text' => $p->defective_product_quantity,
                ]
            ];
            $row[] = $temp;
        }
        $view = [
            'col' => $col, 'header' => '生產批號' . $id . '', 'row' => $row, 'method' => 'GET',
            'module' => '', 'history' => '/admin/report',

        ];
        return view('backend.admin', $view);
    }
}
