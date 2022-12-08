<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\MaterialProduct;
use App\Models\Material;

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
            'header' => 'BOM表清單', 'action' => 'materialProduct/create', 'method' => 'GET',
            'module' => 'product', 'col' => $col, 'row' => $row
        ];
        return view('backend.admin', $view);
    }

    public function show($id)
    {
        $materials = MaterialProduct::where('product_id', $id)->get();
        $contents = [];
        $content = [];
        foreach ($materials as $m) {
            $temp = [
                'id' => $m->product_id,
                'material' => $m->material->name,
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
        $content = self::materialList($materials);
        // dd($content);
        // dd($materials,$content);

        $view = [
            'header' => $id,
            'id' => $id,
            'title' => '產品製程',
            'action' => 'process/create',
            'method' => 'GET',
            'href' => 'process/create',
            'module' => 'process',
            'content' => $content
        ];
        // dd($content);

        return view('backend.materialProduct.show', $view);
    }

    public static function materialList($materials)
    {
        //    如果有next 繼續呼叫並return next
        $contents = [];

        for ($i = 0; $i < count($materials); $i++) {
            $next = MaterialProduct::where('product_id', $materials[$i]['material_id'])->get();
            $temp = [
                'material' => ($materials[$i]->material->name) . '  材質:' . ($materials[$i]->material->material) . ' 規格:' . ($materials[$i]->material->specification),
                'quantity' => $materials[$i]->quantity,
                'unit' => $materials[$i]->unit,
                'id' => $materials[$i]->material_id,
                'pk'=>$materials[$i]->id


            ];
            $contents[] = $temp;
            if (null != $next) {

                $contents[$i]['next'] = self::materialList($next);
            }
            // 如果沒有next 停止呼叫
            else {
            }
        }
        return $contents;
    }
    public function create($id)
    {

        $materials = Material::all();
        $lists = [];
        foreach ($materials as $materials) {
            $temp = [

                'value' => $materials->id,
                'text' => $materials->name

            ];
            $lists[] = $temp;
        }

        $view = [
            'action' => '/admin/materialProduct',
            'header' => '新增原物料',
            'id' => 'insert-materialProduct',
            'btn' => 'insert-mp',
            'footer' => '',
            'body' => [
                [
                    'lable' => '料號',
                    'tag' => 'select',
                    'type' => '',
                    'name' => 'procedure',
                    'lists' => $lists
                ],
                [
                    'lable' => '數量',
                    'tag' => 'input',
                    'type' => 'number',
                    'name' => 'quantity',
                ],
                [
                    'lable' => '單位',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'unit',
                ],
                [
                    'lable' => '',
                    'tag' => 'input',
                    'type' => 'hidden',
                    'name' => 'product_id',
                    'value' => $id,
                ]
            ]
        ];
        return view('component.modal', $view);
    }

    public function store(Request $req)
    {

        $materialProduct = new MaterialProduct;
        $materialProduct->product_id = $req->product_id;
        $materialProduct->material_id = $req->procedure;
        $materialProduct->quantity = $req->quantity;
        $materialProduct->unit = $req->unit;
        // $materialProduct->inventory = 0;
        $materialProduct->save();

        return back()->with('notice', '新增成功');
    }

    public function destroy($id){
        MaterialProduct::destroy($id);
        return '刪除成功';
    }
}
