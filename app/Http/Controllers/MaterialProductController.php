<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\MaterialProduct;

class MaterialProductController extends Controller
{
    public function index()
    {

        $col = [
            '主產品編號', 'BOM詳情',
        ];
        $row = [];
        $products = Product::all();

        foreach ($products as $p) {
            $temp = [
                [
                    'tag' => '',
                    'text' => $p->id
                ],
                [
                    'tag' => 'href',
                    'type' => 'button',
                    'class' => 'px-1 bg-blue-500 rounded hover:bg-blue-700',
                    'text' => 'BOM',
                    'action' => 'show',
                    'id' => $p->id,
                    'href'=>'materialProduct/show/'.$p->id
                ]
            ];
            $row[] = $temp;
        }



        $view = [
            'header' => '物料清單', 'title' => '物料', 'action' => 'materialProduct/create', 'method' => 'GET', 'href' => 'materialProduct/create',
            'module' => 'product','col'=>$col,'row'=>$row
        ];
        return view('backend.admin', $view);
    }

    public function show($id){
        $materials=MaterialProduct::where('product_id',$id)->get();
        $content=[];
        
        foreach($materials as $m){
            $temp=[
                [
                    'material'=>$m->next,
                    'quantity'=>$m->quantity,
                    'unit'=>$m->unit
                    
                ]
            ];
            $content[]=$temp;
        }
        // dd($materials,$content);

        $view=[
            'header' => $id, 'title' => '產品製程', 'action' => 'process/create', 'method' => 'GET', 'href' => 'process/create',
            'module' => 'process','content'=>$content
        ];

        return view('backend.materialProduct.show',$view);
    }
}
