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
        $col = ['料號', '客戶', '產品名稱', '材質', '材料單價', '單重', '射出噸數'];
        $view = [
            'col' => $col, 'header' => '料號清單', 'title' => '料號', 'row' => $products
            ,'action'=>'product'
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
                'name'=>'price'
            ],
            [
                'lable'=>'單重',
                'tag'=>'input',
                'type'=>'number',
                'name'=>'weight'
            ],
            [
                'lable'=>'射出噸數',
                'tag'=>'input',
                'type'=>'number',
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
    public function store(Request $request)
    {
        //
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
