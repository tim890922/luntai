<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Clientuser;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $client = Client::all();
        $col = ['客戶編號', '名稱', '電話','用方詳情','刪除','編輯'];

        $row = [];

        foreach ($client as $m) {
            $temp = [
                [
                    'tag' => '',
                    'text' => $m->id,
                ],
                [
                    'tag' => '',
                    'text' => $m->client_name,
                ],
                [
                    'tag' => '',
                    'text' => $m->client_phone,
                ],
                [
                    'tag' => 'href',
                    'type' => 'button',
                    'class' => 'px-1 bg-blue-500 rounded hover:bg-blue-700',
                    'text' => '用方詳情',
                    'action' => 'show',
                    'id' => $m->id,
                    'href' => 'clientUser/'.'show/'.$m->id
                ],
                [
                    'tag' => 'button',
                    'type' => 'button',
                    'class' => 'px-1 bg-red-500 rounded hover:bg-red-700',
                    'text' => '刪除',
                    'alertname' => '客戶 '. $m->client_name,
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
                    'href' =>'client/edit/'.$m->id
                ]
            ];
            $row[] = $temp;
        }



        $view = [
            'col' => $col, 
            'header' => '客戶清單', 
            'title' => '客戶', 
            'row' => $row, 
            'action' => 'client/create', 'method' => 'GET', 
            'href' => 'client/create',
            'module' => 'client'
        ];
        return view('backend.admin',$view);
    }


    public function create(){
        $view = [
            'action' => '/admin/client',
            'body' => [
                [
                    'lable' => '名稱',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'client_name'
                ],
                [
                    'lable' => '電話',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'client_phone'
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
        $client=Client::find($id);
        $view = [
            'action' => '/admin/client',
            'method'=>'PUT',
            'body' => [
                [
                    'lable' => '',
                    'tag' => 'input',
                    'type' => 'hidden',
                    'name' => 'id',
                    'value'=>$client->id
                ],
                [
                    'lable' => '名稱',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'client_name',
                    'value'=>$client->client_name
                ],
                [
                    'lable' => '電話',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'client_phone',
                    'value'=>$client->client_phone
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
        $p =Client::find($req->id);
        $p->id=$req->id;
        $p->client_name=$req->client_name;
        $p->client_phone=$req->client_phone;
        $p->save();

        return redirect('admin/client')->with('notice', '編輯成功');
    }

    
    public function destroy($id)
    {
        Client::destroy($id);
    }

    public function store(Request $req)
    {

        $c = new client;
        $content = $req->validate(
            [
                'client_name' => 'required',
                'client_phone' => 'required',
            ]
        );
        $c->create($content);

        return redirect('admin/client')->with('notice', '新增成功');
    }
}
