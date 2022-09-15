<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     *列出資料
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $col = ['料號', '名稱',  '材質', '重量', '射出噸數', '客戶','刪除', '編輯'];

        $row = [];

        foreach ($products as $p) {
            $temp = [
                [
                    'tag' => '',
                    'text' => $p->id,
                ],
                [
                    'tag' => '',
                    'text' => $p->name,
                ],
               
                [
                    'tag' => '',
                    'text' => $p->material,
                ],
                [
                    'tag' => '',
                    'text' => $p->weight,
                ],
                [
                    'tag' => '',
                    'text' => $p->tonnes,
                ],
                [
                    'tag' => '',
                    'text' => $p->client->client_name,
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
                    'href'=>'product/edit/'.$p->id
                ]
            ];
            $row[] = $temp;
        }



        $view = [
            'col' => $col, 'header' => '料號清單', 'title' => '料號', 'row' => $row, 'action' => 'product/create', 'method' => 'GET', 'href' => 'product/create',
            'module' => 'product'
        ];


        //    dd($view);
        return view('backend.admin', $view);
    }

    /**
     * Show the form for creating a new resource.
     *轉到新增畫面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = [
            'action' => '/admin/product',
            'body' => [
                [
                    'lable' => '料號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'id'
                ],
                [
                    'lable' => '名稱',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'name'
                ],
                [
                    'lable' => '材質',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'material'
                ],
                [
                    'lable' => '重量',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'weight'
                ],
             
                [
                    'lable' => '射出噸數',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '0.01',
                    'name' => 'tonnes'
                ],
                [
                    'lable' => '客戶編號',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'client_id'
                ]



            ]

        ];
        return view('backend.create', $view);
    }

    /**
     * 儲存新增的資料
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {

        $p = new Product;
        $content = $req->validate(
            [
                'id' => 'required',
                'name' => 'required',
                'material' => 'required',
                'weight' => 'required',
                'tonnes' => 'required',
                'client_id' => 'required',
            ]
        );
        // dd($req);
        // $p->id=$req->id;
        // $p->name=$req->name;
        // $p->weight=$req->weight;
        // $p->tonnes=$req->tonnes;
        // $p->material=$req->material;
        // $p->client_id=$req->client_id;
        $p->create($content);

        return redirect('admin/product')->with('notice', '新增成功');
    }

    /**
     * Display the specified resource.
     *秀單一特定資料
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function edit($id)//到編輯畫面
    {
        $product=Product::find($id);
        $view = [
            'action' => '/admin/product',
            'method'=>'PUT',
            'body' => [
                [
                    'lable' => '料號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'id',
                    'value'=>$product->id
                ],
                [
                    'lable' => '產品名稱',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'name',
                    'value'=>$product->name
                ],
                [
                    'lable' => '材質',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'material',
                    'value'=>$product->material
                ],
                [
                    'lable' => '重量',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '0.001',
                    'name' => 'weight',
                    'value'=>$product->weight
                ],
                [
                    'lable' => '射出噸數',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '0.01',
                    'name' => 'tonnes',
                    'value'=>$product->tonnes
                ],
                [
                    'lable' => '客戶編號',
                    'tag' => 'input',
                    'type' => 'number',
                    'step' => '1',
                    'name' => 'client_id',
                    'value'=>$product->client_id
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
        $p =Product::find($req->id);
        $p->id=$req->id;
        $p->name=$req->name;
        $p->material=$req->material;
        $p->weight=$req->weight;
        $p->tonnes=$req->tonnes;
        $p->client_id=$req->client_id;
        $p->save();

        return redirect('admin/product')->with('notice', '編輯成功');
    }

    /**
     * Remove the specified resource from storage.
     *刪除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
    }
}
