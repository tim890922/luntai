<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientuser;
use App\Models\Client;

class ClientUserController extends Controller
{
    public function index($id){
        $clientUser = Clientuser::where('client_id',$id)->get();
        $col = ['用方編號', '用方名稱','用方地址','刪除','編輯'];

        $row = [];
        $client=Client::find($id);
        foreach ($clientUser as $m) {
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
                    'text' => $m->address,
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
                    'href' =>'clientUser/edit/'.$m->id
                ]
            ];
            $row[] = $temp;
        }



        $view = [
            'col' => $col, 
            'header' => ($client->client_name).'用方資料', 
            'title' => ($client->client_name).'用方', 
            'row' => $row, 
            'method' => 'GET', 
            'href' => '/admin/clientUser/create/'.$id,
            'module' => 'clientUser'
        ];
        return view('backend.admin',$view);
    }


    public function create($id){
        $client=Client::find($id);
        // dd($client->client_name);
        $view = [
            'action' => '/admin/clientUser',
            'header'=>'新增'.($client->client_name),
            'body' => [
                [
                    'lable' => '',
                    'value'=>$id,
                    'tag' => 'input',
                    'type' => 'hidden',
                    'name' => 'id'
                ],
                [
                    'lable' => '用方編號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'id'
                ],
                [
                    'lable' => '用方名稱',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'name'
                ],
                [
                    'lable' => '用方地址',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'address'
                ],
                
            ]

        ];
        return view('backend.create', $view);
    }

    
    /**
     * 編輯單一資料
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//到編輯畫面
    {
        $clientUser=Clientuser::find($id);
        $view = [
            'action' => '/admin/clientUser',
            'method'=>'PUT',
            'body' => [
                [
                    'lable' => '用方編號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'id',
                    'value'=>$clientUser->id
                ],
                [
                    'lable' => '用方名稱',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'name',
                    'value'=>$clientUser->name
                ],
                [
                    'lable' => '用方地址',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'client_phone',
                    'value'=>$clientUser->address
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
        $p =Clientuser::find($req->id);
        $p->id=$req->id;
        $p->name=$req->name;
        $p->address=$req->address;
        $p->save();

        return redirect('admin/clientUser')->with('notice', '編輯成功');
    }

    
    public function destroy($id)
    {
        Clientuser::destroy($id);
    }

    public function store(Request $req)
    {

        $c = new Clientuser;
        $content = $req->validate(
            [
                'id' => 'required',
                'name' => 'required',
                'phone' => 'required',
            ]
        );
        $c->create($content);

        return redirect('admin/clientUser')->with('notice', '新增成功');
    }
}
