<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;
use PHPUnit\Runner\Hook;

class MachineController extends Controller
{
    public function index()
    {
        $machine = Machine::all();
        $col = ['機台別','噸數','刪除','編輯','狀態'];
        
        $row=[];

        foreach($machine as $m)
        {
            $temp=[
                [
                    'tag'=>'',
                    'text'=>$m->id,
                ],
                [
                    'tag'=>'',
                    'text'=>$m->tonnes,
                ],
                [
                    'tag'=>'button',
                    'type'=>'button',
                    'class'=>'px-1 bg-red-500 rounded hover:bg-red-700',
                    'text'=>'刪除',
                    'action'=>'delete',
                    'alertname' => $m->id,
                    'id'=>$m->id
                ],
                [
                    'tag'=>'href',
                    'type'=>'button',
                    'class'=>'px-1 bg-blue-500 rounded hover:bg-blue-700',
                    'text'=>'編輯',
                    'action'=>'edit',
                    'id'=>$m->id,
                    'href' =>'machine/edit/'.$m->id
                ],
                [
                    'tag'=>'button',
                    'type'=>'button',
                    'class'=>($m->status==1)?'px-1 bg-green-300 rounded hover:bg-green-500':'px-1 bg-red-300 rounded hover:bg-red-500' ,
                    'text'=>($m->status==1)?'運作中':'停機',
                    'action'=>'',
                    'id'=>$m->id,
                ]
            ];
            $row[]=$temp;
        }
        // dd($row);
        
        
        
        $view = [
            'col' => $col,
            'header' => '機台管理',
            'title' => '機台',
            'row' => $row,
            'action' => 'machine/create',
            'method' => 'GET',
            'href' => 'machine/create',
            'module'=>'machine'
        ];


        //    dd($view);
        return view('backend.admin', $view);
    }

    public function create()
    {
        $view = [
            'action' => '/admin/machine',
            'body' => [
                [
                    'lable' => '機台別',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'id'
                ],
                [
                    'lable' => '機型',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'manufacturer'
                ],
                [
                    'lable' => '噸數/T',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '0.01',
                    'name' => 'tonnes'
                ],
                [
                    'lable' => '機台定位環',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '0.01',
                    'name' => 'ring'
                ],
                [
                    'lable' => '機台號碼',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'number'
                ],
                [
                    'lable' => '型式',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'type'
                ],
                [
                    'lable' => '射出重量',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'weight'
                ],
                [
                    'lable' => '螺桿直徑',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'diameter'
                ],
                [
                    'lable' => '料管材質',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'tube_material'
                ],
                [
                    'lable' => '柱內寬度/間隔',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '0.01',
                    'name' => 'screw_width'
                ],
                [
                    'lable' => '調模最大/最小值',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'min_max'
                ],
                [
                    'lable' => '螺桿材質',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'screw_material'
                ]
            ]

        ];
        return view('backend.create', $view);
    }

    public function store(Request $req)
    {

        $machine = new Machine;
        $content = $req->validate(
            [
                'id' => 'required',
                'manufacturer' => 'required',
                'tonnes' => 'required',
                'ring' => 'required',
                'number' => 'required',
                'type' => 'required',
                'weight' => 'required',
                'diameter' => 'required',
                'tube_material' => 'required',
                'screw_width' => 'required',
                'min_max' => 'required',
                'screw_material' => 'required',
            ]
        );
        $machine->create($content);

        return redirect('admin/machine')->with('notice', '新增成功');
    }

    public function edit($id)//到編輯畫面
    {
        $machine=Machine::find($id);
        $view = [
            'action' => '/admin/machine',
            'method'=>'PUT',
            'body' => [
                [
                    'lable' => '機台別',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'id',
                    'value'=>$machine->id
                ],
                [
                    'lable' => '機型',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'manufacturer',
                    'value'=>$machine->manufacturer
                ],
                [
                    'lable' => '噸數/T',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '0.01',
                    'name' => 'tonnes',
                    'value'=>$machine->tonnes
                ],
                [
                    'lable' => '機台定位環',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '0.01',
                    'name' => 'ring',
                    'value'=>$machine->ring
                ],
                [
                    'lable' => '機台號碼',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'number',
                    'value'=>$machine->number
                ],
                [
                    'lable' => '型式',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'type',
                    'value'=>$machine->type
                ],
                [
                    'lable' => '射出重量',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'weight',
                    'value'=>$machine->weight
                ],
                [
                    'lable' => '螺桿直徑',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'diameter',
                    'value'=>$machine->diameter
                ],
                [
                    'lable' => '料管材質',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'tube_material',
                    'value'=>$machine->tube_material
                ],
                [
                    'lable' => '柱內寬度/間隔',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '0.01',
                    'name' => 'screw_width',
                    'value'=>$machine->screw_width
                ],
                [
                    'lable' => '調模最大/最小值',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'min_max',
                    'value'=>$machine->min_max
                ],
                [
                    'lable' => '螺桿材質',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'screw_material',
                    'value'=>$machine->screw_material
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
    public function update(Request $req)//儲存編輯資料
    {
        $p =Machine::find($req->id);
        $p->id=$req->id;
        $p->manufacturer=$req->manufacturer;
        $p->tonnes=$req->tonnes;
        $p->ring=$req->ring;
        $p->number=$req->number;
        $p->type=$req->type;
        $p->weight=$req->weight;
        $p->diameter=$req->diameter;
        $p->tube_material=$req->tube_material;
        $p->screw_width=$req->screw_width;
        $p->min_max=$req->min_max;
        $p->screw_material=$req->screw_material;
        $p->save();

        return redirect('admin/machine')->with('notice', '編輯成功');
    }

    public function destroy($id)
    {
        Machine::destroy($id);
    }
}
