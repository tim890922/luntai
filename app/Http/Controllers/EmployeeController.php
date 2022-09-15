<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::all();
        $col = ['員工編號', '姓名', '職位', '識別證號碼','刪除','編輯'];

        $row = [];

        foreach ($employees as $m) {
            $temp = [
                [
                    'tag' => '',
                    'text' => $m->id,
                ],
                [
                    'tag' => '',
                    'text' => $m->name,
                ],
                [
                    'tag' => '',
                    'text' => $m->position,
                ],
                [
                    'tag' => '',
                    'text' => $m->account,
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
                    'alertname' => $m->id,
                    'action' => 'edit',
                    'id' => $m->id,
                    'href'=>'employee/edit/'.$m->id
                ]
            ];
            $row[] = $temp;
        }



        $view = [
            'col' => $col, 'header' => '員工清單', 'title' => '員工', 'row' => $row, 'action' => 'employee/create', 'method' => 'GET', 'href' => 'employee/create',
            'module' => 'employee'
        ];
        return view('backend.admin',$view);
    }
    public function worker()
    {
        $employees = Employee::where('position','作業員')->get();
        $col = ['員工編號', '姓名', '職位', '識別證號碼'];

        $row = [];

        foreach ($employees as $m) {
            $temp = [
                [
                    'tag' => '',
                    'text' => $m->id,
                ],
                [
                    'tag' => '',
                    'text' => $m->name,
                ],
                [
                    'tag' => '',
                    'text' => $m->position,
                ],
                [
                    'tag' => '',
                    'text' => $m->account,
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
                    'tag' => 'button',
                    'type' => 'button',
                    'class' => 'px-1 bg-blue-500 rounded hover:bg-blue-700',
                    'text' => '編輯',
                    'alertname' => $m->id,
                    'action' => 'edit',
                    'id' => $m->id
                ]
            ];
            $row[] = $temp;
        }



        $view = [
            'col' => $col, 
            'header' => '員工清單', 
            'title' => '員工', 
            'row' => $row, 
            'action' => 'employee/create', 'method' => 'GET', 
            'href' => 'employee/create',
            'module' => 'employee'
        ];
        return view('backend.admin',$view);
    }

    public function create(){
        $view = [
            'action' => '/admin/employee',
            'body' => [
                [
                    'lable' => '員工編號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'id'
                ],
                [
                    'lable' => '姓名',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'name'
                ],
                [
                    'lable' => '職位',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'position'
                ],
                [
                    'lable' => '識別證號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'account'
                ],
                [
                    'lable' => '密碼',
                    'tag' => 'input',
                    'type' => 'password',
                    'name' => 'pass_word'
                ]
            ]

        ];
        return view('backend.create', $view);
    }

    public function store(Request $req)
    {

        $employee = new Employee;
        $content = $req->validate(
            [
                'id' => 'required',
                'name' => 'required',
                'position' => 'required',
                'account' => 'required',
                'pass_word' => 'required'
            ]
        );
        $employee->create($content);

        return redirect('admin/employee')->with('notice', '新增成功');
    }

    public function destroy($id)
    {
        Employee::destroy($id);
    }
     /**
     * 編輯單一資料
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//到編輯畫面
    {
        $employee=Employee::find($id);
        $view = [
            'action' => '/admin/employee',
            'method'=>'PUT',
            'body' => [
                [
                    'lable' => '員工編號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'id',
                    'value'=>$employee->id
                ],
                [
                    'lable' => '姓名',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'name',
                    'value'=>$employee->name
                ],
                [
                    'lable' => '職位',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'position',
                    'value'=>$employee->position
                ],
                [
                    'lable' => '識別證號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'account',
                    'value'=>$employee->account
                ],
                [
                    'lable' => '密碼',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'pass_word',
                    'value'=>$employee->pass_word
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
    public function update(Request $req)//儲存編輯資料
    {
        $e =Employee::find($req->id);
        $e->id=$req->id;
        $e->name=$req->name;
        $e->position=$req->position;
        $e->account=$req->account;
        $e->pass_word=$req->pass_word;
        $e->save();

        return redirect('admin/employee')->with('notice', '編輯成功');
    }

    
}
