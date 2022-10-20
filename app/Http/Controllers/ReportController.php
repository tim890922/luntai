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
                    'text' => ($p->time_start) . '-'.($p->time_end),
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
                    'class' => ($p->record==0)?'px-1 bg-red-300 rounded hover:bg-red-500':'px-1 bg-blue-500 rounded hover:bg-blue-700',
                    'text' =>($p->record==0)?'未確認':'確認',
                    'alertname' => $p->id,
                    'action' => 'delete',
                    'id' => $p->id
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
                    'href' => 'product/edit/' . $p->id
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
            'col' => $col, 'header' => '生產進度回報清單', 'title' => '生產進度回保', 'row' => $row, 'action' => 'report/create', 'method' => 'GET', 'href' => 'product/create',
            'module' => 'report'
        ];


        //    dd($view);
        return view('backend.admin', $view);
    }
}
