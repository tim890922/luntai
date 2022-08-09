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
        $col = ['料號', '客戶', '產品名稱', '材質', '材料單價', '單重', '射出噸數','刪除','編輯'];

        $row=[];

        foreach($products as $m)
        {
            $temp=[
                [
                    'tag'=>'',
                    'text'=>$m->id,
                ],
                [
                    'tag'=>'',
                    'text'=>$m->client,
                ],
                [
                    'tag'=>'',
                    'text'=>$m->product_name,
                ],
                [
                    'tag'=>'',
                    'text'=>$m->material,
                ],
                [
                    'tag'=>'',
                    'text'=>$m->price,
                ],
                [
                    'tag'=>'',
                    'text'=>$m->weight,
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
                    'id'=>$m->id
                ],
                [
                    'tag'=>'button',
                    'type'=>'button',
                    'class'=>'px-1 bg-blue-500 rounded hover:bg-blue-700',
                    'text'=>'編輯',
                    'action'=>'edit',
                    'id'=>$m->id
                ]
            ];
            $row[]=$temp;
        }



        $view = [
            'col' => $col, 'header' => '料號清單', 'title' => '料號', 'row' => $row
            ,'action'=>'product/create','method'=>'GET','href'=>'product/create'
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
        $view=[
            'action'=>'/admin/product',
            'body'=>[
            [
             'lable'=>'料號',
             'tag'=>'input',
             'type'=>'text',
             'name'=>'id'
            ],
            [
              'lable'=>'客戶',
              'tag'=>'input',
             'type'=>'text',
             'name'=>'client'
            ],
            [
                'lable'=>'產品名稱',
                'tag'=>'input',
                'type'=>'text',
                'name'=>'product_name'
            ],
            [
                'lable'=>'材質',
                'tag'=>'input',
                'type'=>'text',
                'name'=>'material'
            ],
            [
                'lable'=>'材料單價',
                'tag'=>'input',
                'type'=>'number',
                'step'=>'0.01',
                'name'=>'price'
            ],
            [
                'lable'=>'單重',
                'tag'=>'input',
                'type'=>'number',
                'step'=>'0.01',
                'name'=>'weight'
            ],
            [
                'lable'=>'射出噸數',
                'tag'=>'input',
                'type'=>'number',
                'step'=>'0.01',
                'name'=>'tonnes'
            ]
            
            
            
            ]
            
        ];
        return view('backend.create',$view);
    }

    /**
     * 儲存新增的資料
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        
            $product=new Product;
            $content = $req->validate(
                [
                    'client'=>'required',
                    'product_name'=>'required',
                    'material'=>'required',
                    'price'=>'required',
                    'weight'=>'required',
                    'tonnes'=>'required',
                    'id'=>'required',
                ]
                );
            $product->create($content);

        return redirect('admin/product')->with('notice','新增成功');
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
    public function edit($id)
    {
        //
    }

    /**
     * 上傳編輯資料
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *刪除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
