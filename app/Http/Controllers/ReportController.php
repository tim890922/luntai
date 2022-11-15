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
    {
        $schedules = Schedule::all();
        $col = ['生產批號', '料號', '日期',  '開始時間', '結束時間', '內容', '預計總產量', '進度回報'];

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
            'col' => $col, 'header' => '員工進度回報', 'row' => $row, 'action' => 'product/create', 'method' => 'GET', 'href' => '',
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
                'tag' => 'input',
                'type' => '',
                'name' => 'schedule_id',
                'value' => $id,
                'text' => $id,
                'readonly'=>''
            ],
            [
                'lable' => '料號',
                'tag' => 'input',
                'type' => '',
                'name' => 'product_id',
                'text' => $schedule->product_id,
                'value' => $schedule->product_id,
                'readonly'=>''
            ],
            [
                'lable' => '日期',
                'tag' => 'input',
                'type' => '',
                'name' => 'today',
                'text' => date('Y/m/d'),
                'value' => date('Y/m/d'),
                'readonly'=>''
            ],
            [
                'lable' => '員工編號',
                'tag' => 'input',
                'type' => 'text',
                'value' => (session()->get('user'))->id,
                'name' => 'employee_id',
                'readonly'=>''
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
                'lable' => '不良品總量',
                'tag' => 'input',
                'type' => 'number',
                'step' => '1',
                'name' => 'defective_product_total_quantity',
            ]

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
        $report = new Report;
        $report->schedule_id = $req->schedule_id;
        $report->employee_id = $req->employee_id;
        $report->product_id = $req->product_id;
        $report->shift = $req->shift;
        $report->time_start = $req->time_start;
        $report->time_end = $req->time_end;
        $report->good_product_quantity = $req->good_product_quantity;
        $report->defective_product_quantity = $req->defective_product_total_quantity;

        $report->save();
        $reason = Defective::all();
        foreach ($reason as $reason) {
            $reasonQ = ($reason->reason) . '_quantity';
            $reasonC = ($reason->reason) . '_commend';
            if (!$req->$reasonQ == null && !$req->$reasonQ==0) {
                $dr=new DefectiveReport;//生產批號不良
                $dr->defective_id=$reason->id;
                $dr->report_id=$req->schedule_id;
                $dr->quantity=($req->$reasonQ);
                $dr->detail=($req->$reasonC);
                $dr->save();
            }
        }
        return redirect('admin/report')->with('notice','回報成功');
    }



    public function list()
    {
        $reports = Report::all();
        $col = ['生產批號', '料號',  '員工編號', '班別', '時段', '良品數', '不良品數', '確認', '刪除', '編輯'];

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
                    'class' => 'px-1 bg-red-300 check rounded hover:bg-red-500',
                    'text' => ($p->record == 0) ? '未確認' : '確認',
                    'alertname' => '',
                    'action' => 'edit',
                    'id' => $p->id,
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
    }

    public function check($id)
    {
        $report = Report::find($id);

        if ($report->record == 0)
            $report->record = 1;
        else
            $report->record = 0;

        $report->save();
    }
}
