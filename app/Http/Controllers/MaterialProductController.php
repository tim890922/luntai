<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\MaterialProduct;

use function PHPUnit\Framework\returnSelf;

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
                    'href' => 'materialProduct/show/' . $p->id
                ]
            ];
            $row[] = $temp;
        }



        $view = [
            'header' => '物料清單', 'title' => '物料', 'action' => 'materialProduct/create', 'method' => 'GET', 'href' => 'materialProduct/create',
            'module' => 'product', 'col' => $col, 'row' => $row
        ];
        return view('backend.admin', $view);
    }

    public function show($id)
    {
        $materials = MaterialProduct::where('product_id', $id)->get();
        $contents = [];

        foreach ($materials as $m) {
            $temp = [

                'material' => $m->next,
                'quantity' => $m->quantity,
                'unit' => $m->unit


            ];
            $contents[] = $temp;
        }

        for ($i = 0; $i < count($contents); $i++) {
            $temp = MaterialProduct::where('product_id', $contents[$i]['material'])->get();
            // dd($temp);
            if (isset($temp)) {
                for ($j = 0; $j < count($temp); $j++) {
                    $contents[$i]['next'][$j] = [
                        'material' => $temp[$j]->next,
                        'quantity' => $temp[$j]->quantity,
                        'unit' => $temp[$j]->unit
                    ];
                }
            }
        }
        dd($contents);
        // dd($materials,$content);

        $view = [
            'header' => $id,
            'title' => '產品製程',
            'action' => 'process/create',
            'method' => 'GET',
            'href' => 'process/create',
            'module' => 'process',
            'content' => $contents
        ];

        return view('backend.materialProduct.show', $view);
    }

    public function isNext($product)
    {
        $materials = MaterialProduct::where('product', $product['next'])->get();
        $count = 0;
        foreach ($materials as $material) {
            if (isset($material->next))
                $count++;
        }
        if ($count > 0)
            return true;
        else
            return false;
    }
}
